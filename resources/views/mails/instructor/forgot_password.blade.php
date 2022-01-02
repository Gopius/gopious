@component('mail::message')
# Reset Password

Hello {{$instructor->instr_name}}


@component('mail::button', ['url' => $url, 'color'=>'success'])
Click to Reset Password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
