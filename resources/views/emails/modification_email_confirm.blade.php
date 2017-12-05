@component('mail::message')
# Bonjour {{ $user->name }}

Vous avez modifié votre courrier électronique, nous devons vérifier ce nouveau courrier électronique. Utilisez le bouton ci-dessous:

@component('mail::button', ['url' => route('verify', $user->verification_token)])
Vérifier
@endcomponent

Merci,<br>
{{ config('app.name') }}
@endcomponent