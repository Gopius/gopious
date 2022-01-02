@component('mail::message')
# Reset Password

Hello {{$organization->firstname}}


@component('mail::button', ['url' => route('reset_password', [$organization->verifications->first()->token,]), 'color'=>'success'])
Click to Reset Password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
