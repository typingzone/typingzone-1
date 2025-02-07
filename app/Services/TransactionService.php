<?php

namespace App\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction; 


class TransactionService
{

   public function store($request)
   {
        $serviceCost = $request->service_cost;
        $vatAmount = $serviceCost * 0.05;
        $totalCost = $serviceCost + $vatAmount;
        if ($request->hasFile('receipt')) {
            $filePath = $request->file('receipt')->store('receipts', 's3');
        }
        $transaction = Transaction::create([
            'user_id' => Auth::id(),
            'order_id' => $request->order_id,
            'service_id' => $request->service_id,
            'application_no' => $request->application_no,
            'govt_cost' => $request->govt_cost,
            'service_cost' => $serviceCost,
            'total_cost' => $totalCost,
            'vat_amount' => $vatAmount,
            'status' => 'pending',
            'paid_by' => $request->paid_by,
            'pay_status' => 'unpaid',
            'description' => $request->description,
            'receipt' => $filePath ?? null,
        ]);
   }
    



    public function downloadReceipt($id)
    {
        $transaction = Transaction::findOrFail($id);
        $receiptPath = $transaction->receipt;
        if (Storage::disk('s3')->exists($receiptPath)) {
            return ['success' => true, 'response' => Storage::disk('s3')->download($receiptPath)];
        }
        return ['success' => false,'message' => 'Receipt not found.'];
    }

   
    public function deleteTransaction($id)
    {
        $transaction = Transaction::findOrFail($id);
        if ($transaction->receipt && Storage::disk('s3')->exists($transaction->receipt)) {
            Storage::disk('s3')->delete($transaction->receipt);
        }
        $transaction->delete();
        return ['success' => true,'message' => 'Transaction deleted successfully.'
        ];
    }

}