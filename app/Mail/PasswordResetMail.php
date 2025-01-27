<?php
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PasswordResetMail extends Mailable
{
    use SerializesModels;

    public $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    public function build()
    {
        return $this->subject('Reset Your Password')
                    ->view('emails.password_reset_link')
                    ->with(['token' => $this->token]);
    }
}
