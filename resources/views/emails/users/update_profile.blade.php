@component('mail::message')
# {{ $user->name }}
Hola, te informamos que tu perfil ha sido actualizado satisfactoriamente.
<br />
<br />
Saludos.
<br>
Equipo {{ config('app.name') }}.
@endcomponent
