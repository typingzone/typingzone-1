<?php
<<<<<<< HEAD
=======

>>>>>>> 023abcbfc092666fd811ecc2b6e7e0a49bdf5ac0
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ExpiryDocumentReminderMail extends Mailable
{
    use Queueable, SerializesModels;

<<<<<<< HEAD
    public $documents;

    public function __construct($documents)
    {
=======
    public $user;
    public $companyLogo;
    public $companyName;
    public $userName;
    public $documents;

    public function __construct($user, $companyLogo, $companyName, $userName, $documents)
    {
        $this->user = $user;
        $this->companyLogo = $companyLogo;
        $this->companyName = $companyName;
        $this->userName = $userName;
>>>>>>> 023abcbfc092666fd811ecc2b6e7e0a49bdf5ac0
        $this->documents = $documents;
    }

    public function build()
    {
        return $this->view('emails.expiry_reminder')
                    ->subject('Document Expiry Reminder')
<<<<<<< HEAD
                    ->with('documents', $this->documents);
=======
                    ->with([
                        'user' => $this->user,
                        'companyLogo' => $this->companyLogo,
                        'companyName' => $this->companyName,
                        'userName' => $this->userName,
                        'documents' => $this->documents,
                    ]);
>>>>>>> 023abcbfc092666fd811ecc2b6e7e0a49bdf5ac0
    }
}
