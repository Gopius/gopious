@component('mail::message')
# Reset Password

Hello {{$admin->firstname}}


@component('mail::button', ['url' => route('admin.reset_password', [$admin->verifications->first()->token,]), 'color'=>'success'])
Click to Reset Password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
