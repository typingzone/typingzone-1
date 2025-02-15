<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction; 
use App\Services\TransactionService;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ArchivedTransactionsExport;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{

    protected $transactionService;

    public function __construct(TransactionService $transactionService)
    {
        $this->transactionService = $transactionService;
    }


    public function index()
    {
        $transactions = Transaction::with(['order' => function($query) {
            $query->withTrashed();
        }, 'user'])->orderBy('created_at', 'desc')->get();
        return view('pages.transactions.transactions', compact('transactions'));
    }
    
    
    public function archivedTransactions()
    {
        $tableNames = [];
        for ($i = 1; $i <= 10; $i++) {
            $tableName = "transactions_$i";
            if (Schema::hasTable($tableName)) {
                $tableNames[] = $tableName;
            }
        }
        return view('pages.transactions.archived_transactions', compact('tableNames'));
    }


    public function showInvoices()
    {
        return view('pages.transactions.invoices');
    }


    public function store(Request $request)
    {
        try {
            $request->validate([
                'order_id' => 'required',
                'service_id' => 'required',
                'application_no' => 'required|string',
                'govt_cost' => 'required|numeric',
                'service_cost' => 'required|numeric',
                'paid_by' => 'required|string',
                'receipt' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            ]);
            $this->transactionService->store($request);
            return response()->json(['success' => true, 'message' => 'Transaction created successfully.']);
        } catch (\Exception $e) {
            Log::error('Transaction Creation Error: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Failed to create transaction.'], 500);
        }
    }
    
   

    public function destroy($id)
    {
        try {
            $response = $this->transactionService->deleteTransaction($id);
            return response()->json($response);
        } catch (\Exception $e) {
            Log::error('Transaction deletion error: '.$e->getMessage());
            return response()->json(['success' => false, 'message' => 'Error deleting transaction.'], 500);
        }
    }
    
    
    

    public function downloadReceipt($id)
    {
        try {
            $result = $this->transactionService->downloadReceipt($id);
            if ($result['success']) {
                return $result['response'];
            }
            return back()->withErrors($result['message']);
        } catch (\Exception $e) {
            Log::error('Receipt download error: '.$e->getMessage());
            return back()->withErrors('Error downloading receipt.');
        }
    }
    


    public function updateStatus(Request $request, $id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->status = $request->status;
        $transaction->save();
        return response()->json(['status' => $request->status]);
    }


    public function edit($id)
    {
        $transaction = Transaction::with(['order' => function($query) {
            $query->withTrashed();
        }, 'service'])->findOrFail($id);
        return response()->json($transaction);
    }
    
    
    public function update(Request $request, $id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->update($request->all());
        return response()->json(['success' => true, 'message' => 'Transaction updated successfully.']);
    }
    

    public function exportArchivedTransactions($tableName)
    {
        return Excel::download(new ArchivedTransactionsExport($tableName), $tableName . '.xlsx');
    }

    public function deleteArchivedTransactionsTable(Request $request)
    {
        try {
            DB::statement("DROP TABLE IF EXISTS {$request->tableName}");
            return response()->json(['status' => 'success', 'message' => 'Table deleted successfully!']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Failed to delete the table!']);
        }
    }

}
