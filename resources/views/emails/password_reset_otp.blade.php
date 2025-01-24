@include('emails.partials.header')

<p>Hello,</p>
<p>Your OTP for password reset is: <strong>{{ $otp }}</strong></p>
<p>This OTP is valid for 10 minutes.</p>
<p>If you did not request a password reset, please ignore this email.</p>

@include('emails.partials.footer')
