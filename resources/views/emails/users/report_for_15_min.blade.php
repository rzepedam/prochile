@component('mail::message')
# Quiere saber que ocurre en Enexpro ?

Le informamos el detalle de lo transcendido desde las 8:30 a las 9:30. Recuerde que lo continuaremos informando en periodos de 15 minutos.

&nbsp;

[![Visitar plataforma Enexpro]({!! asset('/img/gender.png') !!})]({{ getenv('APP_URL') }})

@component('mail::subcopy')
[![Visitar plataforma Enexpro]({!! asset('/img/industry.png') !!})]({{ getenv('APP_URL') }})
@endcomponent

@component('mail::subcopy')
[![Visitar plataforma Enexpro]({!! asset('/img/nationality.png') !!})]({{ getenv('APP_URL') }})
@endcomponent

@component('mail::subcopy')
[![Visitar plataforma Enexpro]({!! asset('/img/time_lapse.png') !!})]({{ getenv('APP_URL') }})
@endcomponent

&nbsp;

# Desea más información ?
Puede visitar nuestra plataforma y conocer el detalle de lo que está aconteciendo.

@component('mail::button', ['url' =>  getenv('APP_URL')])
Visitar Web
@endcomponent
<br />
Saludos.
<br />
Equipo {{ config('app.name') }}.
@component('mail::subcopy')
Si tiene problemas al hacer click en el botón, copie y pegue el siguiente enlace en su navegador
<a url="{{ '/login' }}" target="_blank">{{ getenv('APP_URL') }}</a>
@endcomponent

@endcomponent