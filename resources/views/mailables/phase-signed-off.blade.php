@component('mail::message')
# Project Phase Signed Off!

The sign-off '{{ $signoff->name }}' for _{{ $project->name }}_ has been signed off by the client.

This project is ready to continue to the next phase.

@component('mail::button', ['url' => $url])
    View Project
@endcomponent

Thanks,<br/>
The {{ config('app.name') }} Team

@endcomponent
