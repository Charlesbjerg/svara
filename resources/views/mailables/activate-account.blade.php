@component('mail::message')

# Welcome to Svara!
An account for you has been created by the owner of your company. Please click the link below to finish the setup process for you account.

@component('mail::button', ['url' => $user->activationUrl()])
    Activate Account
@endcomponent

*This email was sent to {{ $user->email }}*

Enjoy,<br/>
The {{ config('app.name') }} Team

@endcomponent
