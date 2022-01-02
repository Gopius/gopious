@component('mail::message')
# Instructor Login Credentials <i>{{$instructor->organization->org_name}}</i>

Hello {{$instructor->instr_name}}.<br><br>
You have recieved this email because, you are now an Instructor under <b>{{$instructor->organization->org_name}}</b> on {{ config('app.name') }}.<br>
here is your login detail
@component('mail::panel')
email: {{$instructor->instr_email}}<br>
password: {{$instructor->open_password}}<br>
@endcomponent


@component('mail::button', ['url' => $url, 'color'=>'success'])
Click to login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
