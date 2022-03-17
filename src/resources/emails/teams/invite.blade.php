@component('mail::message')
    {{ $invite->user->name }} wants you to join their team: {{ $invite->team->name }}

    @if (!$hasAccount)
        @component('mail::button', ['url' => route('register', ['email' => $invite->email, 'invite' => $invite->code])])
            Create Your Account
        @endcomponent
    @endif

    @if ($hasAccount)
        @component('mail::button', ['url' => route('team-invitations.accept', ['invitation' => $invite->code])])
            Login To Join
        @endcomponent
    @endif

    Looking forward to having you on the team!
@endcomponent
