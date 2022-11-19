@component('mail::message')

<label><b>Name : </b></label>{{ $details['name'] }} <br>
<label><b>Email : </b></label>{{ $details['email'] }} <br>
<label><b>Phone : </b></label>{{ $details['phone'] }} <br>
<label><b>Subject : </b></label>{{ $details['subject'] }} <br>
<label><b>Message : </b></label>{{ $details['msg'] }} <br>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
