<?php

namespace App\Mail;

<<<<<<< HEAD
use Illuminate\Bus\Queueable;
=======
>>>>>>> 023abcbfc092666fd811ecc2b6e7e0a49bdf5ac0
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PasswordResetMail extends Mailable
{
<<<<<<< HEAD
    use Queueable, SerializesModels;

    public $otp;

    public function __construct($otp)
    {
        $this->otp = $otp;
=======
    use SerializesModels;

    public $token;

    public function __construct($token)
    {
        $this->token = $token;
>>>>>>> 023abcbfc092666fd811ecc2b6e7e0a49bdf5ac0
    }

    public function build()
    {
<<<<<<< HEAD
        return $this->subject('Your Password Reset OTP')
                    ->view('emails.password_reset_otp')
                    ->with(['otp' => $this->otp]);
=======
        return $this->subject('Reset Your Password')
                    ->view('emails.password_reset_link')
                    ->with(['token' => $this->token]);
>>>>>>> 023abcbfc092666fd811ecc2b6e7e0a49bdf5ac0
    }
}
