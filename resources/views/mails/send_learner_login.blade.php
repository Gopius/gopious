@component('mail::message')
# Learner Login Credentials <i>{{$learner->organization->org_name}}</i>

Hello {{$learner->learner_name}}.<br><br>
You have recieved this email because, you are now an Learner under <b>{{$learner->organization->org_name}}</b> on {{ config('app.name') }}.<br>
here is your login detail
@component('mail::panel')
email: {{$learner->learner_email}}<br>
password: {{$learner->open_password}}<br>
@endcomponent


@component('mail::button', ['url' => $url, 'color'=>'success'])
Click to login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
