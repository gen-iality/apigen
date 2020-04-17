@component('mail::message')

Hola {{$eventuser_name}}, estas inscrito en: <br>{{$event->name}}
----------------

{!!$message!!}

@component('mail::promotion')

![Logo]({{$image}})

@component('mail::button', ['url' => 'https://api.evius.co/api/rsvp/confirmrsvp/'.$eventUser->id, 'color' => 'evius'])

Confirmar asistencia
@endcomponent

@endcomponent

@component('mail::panel')
{!!$event->description!!}

<div style="text-align: center">
    <span>
    Para ingresar visita el siguiente link:
    @component('mail::button', ['url' => 'https://eviusauth.netlify.com/', 'color' => 'evius'])
    Ingresar a EVIUS
    @endcomponent

Tus datos de acceso son:<br>

Usuario: {{$email}} <br>
Contraseña: {{$password}

Te esperamos.
    </span>
</div>
-----------------------
@endcomponent
@component('mail::table')
|                       |                                                                                        | 
| --------------------  |:--------------------------------------------------------------------------------------:| 
| **Fecha:**            | **Hora:**                                                                              | 
| {{ date('l, F j Y ', strtotime($event->datetime_from)) }} | {{date('H:i:s', strtotime($event->datetime_from)) }} |
|<br>                   |<br>  
@if($event->datetime_to)
| **Hasta:**            | **Hora:**                                                                              | 
| {{ date('l, F j Y ', strtotime($event->datetime_from)) }} | {{date('H:i:s', strtotime($event->datetime_to)) }}   | 
@endif

@endcomponent

@component('mail::panel')
@if($event_location != null)
Ubicación del evento  <br>

{{$event_location}} 
-----------------------
@endif
@endcomponent


@component('mail::button', ['url' => 'https://api.evius.co/api/rsvp/confirmrsvp/'.$eventUser->id, 'color' => 'evius'])
Confirmar asistencia

@endcomponent

@component('mail::subcopy')
{{$footer}}
@endcomponent


@endcomponent



