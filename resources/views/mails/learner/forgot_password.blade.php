@component('mail::message')
# Reset Password

Hello {{$learner->learner_name}}


@component('mail::button', ['url' => $url, 'color'=>'success'])
Click to Reset Password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
