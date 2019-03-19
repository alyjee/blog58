@component('mail::message')
# Notification

{{ $body }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
