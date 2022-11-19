Hi, {{ $name }}
<br>
Your Password Reset Link : <a href="{{url('/reset-password/'.$token)}}">Reset Password</a>