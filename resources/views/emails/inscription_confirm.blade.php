@component('mail::message')
# Bonjour {{ $user->name }}

Votre compte a été crée avec succès. Pour vérifier votre inscription, cliquez sur le bouton ci-dessous:

@component('mail::button', ['url' => route('verify', $user->verification_token)])
    Vérifier
@endcomponent

Merci,<br>
{{ config('app.name') }}
@endcomponent