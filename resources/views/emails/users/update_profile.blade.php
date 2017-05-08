@component('mail::message')
# {{ $user->name }}
Tu perfil ha sido actualizado satisfactoriamente.
<br />
<br />
Saludos.
<br>
Equipo {{ config('app.name') }}.
@endcomponent
