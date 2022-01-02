@component('mail::message')
# NOTIFICATION

{{$organization->firstname}} has signed up an Organization



Thanks you,<br>
{{ config('app.name') }}
@endcomponent
