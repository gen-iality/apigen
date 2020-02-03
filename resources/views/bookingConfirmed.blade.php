@component('mail::message')

{{$event->name}}
 <!-- ![Evius]({{$logo}}) -->
Hola {{$eventuser_name}}, has sido invitad@ a {{$event->name}}
<div style="text-align: justify">
    <span>
        Aquí podrás encontrar la información del evento y el
        código QR que deberás presentar a la entrada para
        ingresar rápidamente al evento. Puedes mostrarlo
        desde tu smartphone o si prefieres imprime el archivo
        PDF adjunto.
    </span>
</div>
<br />
<!-- <img src="https://api.evius.co/api/generatorQr/{{$eventuser_id}}"> -->
<img style="display:block,margin:0 auto" src="{{$qr}}" />


@component('mail::table')
| **Tipo de Entrada:**            | **Precio:**                                                                  |
|:----------------------:|:-------------------------------------------------------------------------------------:|
|General | Invitacion |
@endcomponent
@component('mail::table')
| **Fecha Inicio:**            | **Hora:**                                                                       |
|:---------------------:|:--------------------------------------------------------------------------------------:|
| {{ date('l, F j Y ', strtotime($event->datetime_from)) }} | {{date('H:s', strtotime($event->datetime_from)) }} |
|<br>                   |<br>
| **Fecha Finalizacion:**            | **Hora:**                                                                 |
| {{ date('l, F j Y ', strtotime($event->datetime_to)) }} |  {{date('H:s', strtotime($event->datetime_to)) }} |

@endcomponent

@component('mail::panel')
Ubicación del evento  <br>

{{$event_location}}
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
