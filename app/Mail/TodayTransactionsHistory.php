<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TodayTransactionsHistory extends Mailable
{
    use Queueable, SerializesModels;

    protected $transactions;
    protected $filePath;
    protected $companyLogo;
    protected $companyName;
    
    public function __construct($companyLogo, $companyName, $transactions, $filePath)
    {
        $this->transactions = $transactions;
        $this->filePath = $filePath;
        $this->companyLogo = $companyLogo;
        $this->companyName = $companyName;
    }

    public function build()
    {
        return $this->subject('Daily Transaction Report - ' . now()->format('Y-m-d'))
            ->view('emails.daily-transactions')
            ->with([
                'companyName' => $this->companyName,
                'companyLogo' => $this->companyLogo,
                'transactionCount' => $this->transactions->count(),
                'totalAmount' => $this->transactions->sum('total_cost'),
            ])
            ->attach($this->filePath, [
                'as' => 'transactions-' . now()->format('Y-m-d') . '.xlsx',
                'mime' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
            ]);
    }
}