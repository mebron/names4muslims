@component('mail::message')
<h4>Hello {{ $user->name }}</h4>
One last step!

@component('mail::button', ['url' => url('register/verify', $user->verification_token) ])
Click here to verify your account
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
