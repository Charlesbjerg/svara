@component('mail::message')
# Project Requires Sign-off

A project you're involved with on Svara requires a sign-off before it can continue.

Click the link below to view the sign-off document.

@component('mail::button', ['url' => $url])
View Sign-off
@endcomponent

Thanks,<br>
The {{ config('app.name') }} Team
@endcomponent
