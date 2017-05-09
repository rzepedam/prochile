@component('mail::message')
# Bienvenido(a) {{ $user->name }}
Ya tienes acceso a nuestra plataforma de <b>Enexpro</b>. Tus credenciales de acceso son las siguientes:
<br />
<br />
@component('mail::panel')
Usuario: {{ $user->email }}
<br />
Contraseña: {{ $password }}
@endcomponent
<br />
<br />
Te sugerimos que cambies la contraseña y tu imagen de perfil inmediatamente desde aquí
@component('mail::button', ['url' =>  getenv('APP_URL') . '/login'])
Editar Perfil
@endcomponent
<br />
Saludos.
<br>
Equipo {{ config('app.name') }}.
@component('mail::subcopy')
Si tiene problemas al hacer click en el botón, copie y pegue el siguiente enlace en su navegador
<a url="{{ '/login' }}" target="_blank">{{ getenv('APP_URL') . '/login' . $user->id . '/edit' }}</a>
@endcomponent

@endcomponent
