@component('mail::message')
    # {{ $phase->name }} Complete!

    The '{{ $phase->name }} phase for the project '{{ $project->name }}' has been completed.

    @component('mail::button', ['url' => $url])
        View Project
    @endcomponent

    Thanks,<br/>
    The {{ config('app.name') }} Team

@endcomponent
