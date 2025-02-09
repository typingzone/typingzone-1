<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotesReminderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $companyLogo;
    public $companyName;
    public $userName;
    public $notes;

    public function __construct($user, $companyLogo, $companyName, $userName, $notes)
    {
        $this->user = $user;
        $this->companyLogo = $companyLogo;
        $this->companyName = $companyName;
        $this->userName = $userName;
        $this->notes = $notes;
    }

    public function build()
    {
        return $this->view('emails.notes_reminder')
                    ->subject('Notes Reminder')
                    ->with([
                        'user' => $this->user,
                        'companyLogo' => $this->companyLogo,
                        'companyName' => $this->companyName,
                        'userName' => $this->userName,
                        'notes' => $this->notes,
                    ]);
    }
}
