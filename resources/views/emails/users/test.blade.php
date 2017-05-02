@component('mail::message')
# Bienvenido(a)

Ya tienes acceso a nuestra plataforma de <b>Enexpro</b>

@component('mail::button', ['url' =>  getenv('APP_URL') . '/'])
Accede desde aquí
@endcomponent
<br />
<br />
Saludos.
<br>
Equipo {{ config('app.name') }}.

@component('mail::subcopy')
Si tiene problemas al hacer click en el botón, copie y pegue el siguiente enlace en su navegador
<a url="{{ '/login' }}" target="_blank">{{ getenv('APP_URL') . '/' }}</a>
@endcomponent

@endcomponent
