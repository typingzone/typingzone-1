<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ExpiryDocumentReminderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $documents;

    public function __construct($documents)
    {
        $this->documents = $documents;
    }

    public function build()
    {
        return $this->view('emails.expiry_reminder')
                    ->subject('Document Expiry Reminder')
                    ->with('documents', $this->documents);
    }
}
