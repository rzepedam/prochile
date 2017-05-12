@component('mail::message')
# Buenos días,

Le recordamos que la acreditación a **ENEXPRO**, se realizará en **ala Sur, del 2° piso Hotel Antofagasta a través de la empresa Control QTIME**.

@component('mail::subcopy')
Prochile informs that  the accreditation to **ENEXPRO**, will be held in the South wing of the 2nd floor at Hotel Antofagasta through Control Qtime company.
@endcomponent

Saludos.
Equipo {{ config('app.name') }}.
@endcomponent
