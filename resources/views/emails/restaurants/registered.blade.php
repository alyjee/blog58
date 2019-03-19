@component('mail::message')
# Welcome

Bellykick welcomes you as a partner restaurant. You have received an invitation to claim your admin portal powered by bellykick. Please click the button below to login to your account with following details:

Email: {{ $user->email }}<br>
Password: {{ $user->password }}<br>

@component('mail::button', ['url' => env('APP_URL') ])
Login into Admin Panel
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
