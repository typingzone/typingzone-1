<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Mail\ExpiryDocumentReminderMail;
use App\Mail\NotesReminderMail;
use App\Models\Note;
use App\Models\Company;
use Illuminate\Support\Facades\Mail;
use App\Mail\TodayTransactionsHistory;
use App\Models\Reminder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Order;
use App\Models\Transaction;
use App\Exports\DailyTransactionExport;

class CronJobController extends Controller
{
    public function expiryDocumentReminder(Request $request)
    {
        $reminder = Reminder::where('reminder_type', 'Document Expiry')->where('status', 1)->first();
        if ($reminder) {
            $documents = Document::where('expiry_date', '<=', now()->addDays(30))
                            ->whereHas('documentName', function($query) {
                                $query->where('expiry_reminder', true);
                            })
                            ->with('user')
                            ->get();
            $companyInfo = $this->getCompanyInfo();
            $companyLogo = $companyInfo['logo'];
            $companyName = $companyInfo['name'];
            foreach ($documents as $document) {
                if ($document->user && $document->user->email) {
                    $userName = $document->user->name;
                    Mail::to($document->user->email)->send(new ExpiryDocumentReminderMail($document->user, $companyLogo, $companyName, $userName, $documents));
                }
            }
            return response()->json(['status' => 'success', 'message' => 'Expiry document reminders processed successfully.']);
        }
        return response()->json(['status' => 'error', 'message' => 'No expiry document reminders found.']);
    }




    public function notesReminder()
    {
        $reminder = Reminder::where('reminder_type', 'Notes Reminders')->where('status', 1)->first();
        if ($reminder) {
            $notes = Note::whereDate('reminder_date', now()->toDateString())->with('user')->get();
            if ($notes->isEmpty()) {
                return response()->json(['status' => 'error', 'message' => 'No notes with today\'s reminder date found.']);
            }
            $companyInfo = $this->getCompanyInfo();
            $companyLogo = $companyInfo['logo'];
            $companyName = $companyInfo['name'];
            foreach ($notes as $note) {
                if ($note->user && $note->user->email) {
                    $userName = $note->user->name;
                    Mail::to($note->user->email)->send(new NotesReminderMail($note->user, $companyLogo, $companyName, $userName, $notes));
                }
            }
            return response()->json(['status' => 'success', 'message' => 'Notes reminders processed successfully.']);
        }
        return response()->json(['status' => 'error', 'message' => 'No notes reminders found.']);
    }

    private function getCompanyInfo()
    {
        $company = Company::first();
        $companyLogo = $company->company_logo ? asset('storage/uploads/logos/'.$company->company_logo) : asset('/build/img/logo.jpeg');
        $companyName = $company->company_name;
        return [
            'logo' => $companyLogo,
            'name' => $companyName
        ];
    }


    
    public function makeTransactionsArchive()
    {
        $maxRecords = 2; 
        $moveCount = 1;   
        $currentCount = DB::table('transactions')->count();
        if ($currentCount <= $maxRecords) {
            return response()->json(['message' => 'No need to move records.'], 200);
        }
        $index = 1;
        while (Schema::hasTable("transactions_$index")) {
            $index++;
        }
        $newTable = "transactions_$index";
        Schema::create($newTable, function ($table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('service_id');
            $table->decimal('govt_cost', 10, 2)->nullable();
            $table->decimal('service_cost', 10, 2)->nullable();
            $table->decimal('total_cost', 10, 2)->nullable();
            $table->string('application_no')->nullable();
            $table->string('status')->nullable();
            $table->string('paid_by')->nullable();
            $table->string('pay_status')->nullable();
            $table->string('description')->nullable();
            $table->string('receipt')->nullable();
            $table->decimal('vat_amount', 10, 2)->nullable();
            $table->timestamps();
        });
        $oldestRecords = DB::table('transactions')->orderBy('created_at', 'asc')->limit($moveCount)->get();
        if ($oldestRecords->isEmpty()) {
            return response()->json(['message' => 'No records to move.'], 200);
        }
        foreach ($oldestRecords as $record) {
            DB::table($newTable)->insert((array) $record);
            DB::table('transactions')->where('id', $record->id)->delete();
        }
        return response()->json([
            'message' => "Moved $moveCount records to $newTable",
            'newTable' => $newTable
        ], 200);
    }


    public function makeOrdersArchive()
    {
        $maxRecords = 2; 
        $moveCount = 1;   
        $currentCount = DB::table('orders')->count();
        if ($currentCount <= $maxRecords) {
            return response()->json(['message' => 'No need to move records.'], 200);
        }
        $index = 1;
        while (Schema::hasTable("orders_$index")) {
            $index++;
        }
        $newTable = "orders_$index";
        Schema::create($newTable, function ($table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('customer_name');
            $table->string('phone_number')->nullable();
            $table->string('email')->nullable();
            $table->json('services');
            $table->json('files')->nullable();
            $table->text('description')->nullable();
            $table->string('assign_to')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        $oldestRecords = DB::table('orders')->orderBy('created_at', 'asc')->limit($moveCount)->get();
        if ($oldestRecords->isEmpty()) {
            return response()->json(['message' => 'No records to move.'], 200);
        }
        foreach ($oldestRecords as $record) {
            DB::table($newTable)->insert((array) $record);
            DB::table('orders')->where('id', $record->id)->delete();
        }
        return response()->json([
            'message' => "Moved $moveCount records to $newTable",
            'newTable' => $newTable
        ], 200);
    }



    public function deleteSoftdeleteOrders()
    {
        Order::onlyTrashed()->forceDelete();
    }

    public function receiveTodayTransactionsHistory()
    {
        try {
            $reminder = Reminder::where('reminder_type', 'Receive Daily Transactions')->where('status', 1)->first();
            if (!$reminder) {
                return response()->json(['message' => 'Daily transaction reminder is disabled']);
            }
            $transactions = Transaction::with(['order', 'user', 'service'])->whereDate('created_at', now()->toDateString())->get();
            if ($transactions->isEmpty()) {
                return response()->json(['message' => 'No transactions found for today']);
            }
            $export = new DailyTransactionExport($transactions);
            $filePath = $export->handle();
            if ($filePath) {
                $company = Company::first();
                $companyEmail = $company->email;
                $companyLogo = $company->company_logo;
                $companyName = $company->company_name;
                Mail::to($companyEmail)->send(new TodayTransactionsHistory($companyLogo, $companyName, $transactions, $filePath));
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
                return response()->json(['message' => 'Transaction report sent successfully']);
            }
            return response()->json(['error' => 'Failed to generate excel file'], 500);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => 'Failed to process transaction report'], 500);
        }
    }
    


    public function deleteActivitiesLog(){
        DB::table('activity_log')->where('created_at','<',now()->subDays(30))->delete();
        return response()->json(['message'=>'Activity log deleted successfully']);
    }
    

}
