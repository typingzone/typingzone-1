@include('emails.partials.header')

<p>Hello,</p>
<p>You can reset your password by clicking the link below:</p>
<a href="{{ url('password/reset/'.$token.'?email='.$email) }}">Reset Password</a>
<p>This link will expire in 60 minutes.</p>
<p>If you did not request a password reset, please ignore this email.</p>

@include('emails.partials.footer')
