@component('mail::message')
# {{ $user->name }}
Tu perfil ha sido actualizado satisfactoriamente.
<img src="{{ $message->embed(assets('/img/gender.png')) }}">
<br />
<br />
Saludos.
<br>
Equipo {{ config('app.name') }}.
@endcomponent
