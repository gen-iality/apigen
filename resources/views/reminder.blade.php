@component('mail::message')


<img src="https://firebasestorage.googleapis.com/v0/b/eviusauth.appspot.com/o/WhatsApp%20Image%202020-01-31%20at%204.38.14%20PM.jpeg?alt=media&token=6525767f-1c97-4cce-85d1-ecdc8277cea9">
 <!-- ![Evius]({{$logo}}) -->
 {{ $title }}
<div style="text-align: justify">
    <span>
    {{ $desc }}
    </span>
    
</div>
<br />


<div style="text-align: center">
</div>

@component('mail::table')
| **Fecha Inicio Evento:**            | **Hora:**                                                                       |
|:---------------------:|:--------------------------------------------------------------------------------------:|
| {{ date('l, F j Y ', strtotime($event->datetime_from)) }} | {{date('H:i:s', strtotime($event->datetime_from)) }} |
|<br>                   |<br>
| **Fecha Finalizacion:**            | **Hora:**                                                                 |
| {{ date('l, F j Y ', strtotime($event->datetime_to)) }} |  {{date('H:i:s', strtotime($event->datetime_to)) }} |

@endcomponent

@component('mail::panel')
Ubicación del evento  <br>

{{ $event_address }}
-----------------------
@endcomponent

<div style="text-align: center">
    <span>
        A través del sitio web de Evius.co puedes acceder
        fácilmente a las entradas de tus eventos. Comienza
        dando clic en el siguiente enlace para confirmar tu
        cuenta y ver los eventos que esperan por ti 
    </span>
</div>

<!-- Click aqui
@component('mail::button', ['url' => url('/api/rsvp/confirmrsvp/5bb64a02c065863d470263a8'), 'color' => 'evius'])
Confirmar Cuenta
@endcomponent -->

@component('mail::subcopy')
@endcomponent

[Políticas de privacidad](https://evius.co/privacy) | 
[Términos y Condiciones](https://evius.co/terms)

<div style="text-align: center">
    <span>
        Recibiste este correo porque estás inscrito en un
        evento gestionado a través de Evius.co o te has
        registrado en el portal de Evius.co
    </span>
</div>
<div style="text-align: center">
    <span>

    </span>
    <span></span>
</div>
@slot('footer')
@component('mail::footer')
        © 2001-2018. All Rights Reserved - Evius.co
        is a registered trademark of MOCION
@endcomponent
@endslot
@endcomponent
