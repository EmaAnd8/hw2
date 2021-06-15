@component('mail::message')
# Benvenuto {{$user->username}}

Ti sei registrato correttamente conferma  adesso l'email e  potrai accedere ai servizi della DBRECORDS

Thanks,<br>
{{ config('app.name') }}
@endcomponent
