<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Mail\ExpiryDocumentReminderMail;
use App\Mail\NotesReminderMail;
use App\Models\Note;
use App\Models\Company;
use Illuminate\Support\Facades\Mail;
use App\Models\Reminder;

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
            $notes = Note::whereDate('reminder_date', now()->toDateString())
                            ->with('user')
                            ->get();
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

}
