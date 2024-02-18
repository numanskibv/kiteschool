@component('mail::message')
    # Uitnodiging aangemaakt

    Er is een nieuwe uitnodiging aangemaakt voor {{ $invite->email }}.

    @component('mail::button', ['url' => url('/register/' . $invite->code)])
        Bekijk uitnodiging
    @endcomponent

    Bedankt,<br>
    {{ config('app.name') }}
@endcomponent
