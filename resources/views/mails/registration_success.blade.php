@component('mail::message')
# Welcome

Hello {{$organization->firstname}}

@component('mail::button', ['url' => route('verify_org_token', [$organization->verification->token,]), 'color'=>'success'])
Click to complete Registration
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
