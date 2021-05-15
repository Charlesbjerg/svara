@component('mail::message')
    # Message Received!

    A message has been received in the thread '{{ $thread->name }}' for the '{{ $project->name }}' project.

    @component('mail::button', ['url' => $url])
        View Project
    @endcomponent

    Thanks,<br/>
    The {{ config('app.name') }} Team

@endcomponent
