<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction; 
use App\Services\TransactionService;
use Illuminate\Support\Facades\Log;

class TransactionController extends Controller
{

    protected $transactionService;

    public function __construct(TransactionService $transactionService)
    {
        $this->transactionService = $transactionService;
    }


    public function index()
    {
        $transactions = Transaction::with('order', 'user')->orderBy('created_at', 'desc')->get();
        return view('pages.transactions.transactions', compact('transactions'));
    }
    
    
    public function archivedTransactions()
    {
        return view('pages.transactions.archived_transactions');
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
                'receipt' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
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


}
