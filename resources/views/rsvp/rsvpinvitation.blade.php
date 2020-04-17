@component('mail::message')

Hola {{$eventUser_name}}, estas inscrito en: {{$event->name}}
----------------
@component('mail::panel')
<div style="text-align: center;font-size: 130%;">
    <span>
<p style="font-size: 130%">Para ingresar al evento y ver mas informacion visitanos en:
    @component('mail::button', ['url' => 'https://eviusauth.netlify.com/', 'color' => 'evius'])
    Ingresar a EVIUS
    @endcomponent
Tus datos de acceso son:<br>

Usuario: {{$email}} 
<br>
Contraseña: {{$password}} 
<br>
Te esperamos.
</p>
</div>
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

{!!$message!!}

@component('mail::promotion')

![Logo]({{$image}})

@endcomponent


@component('mail::panel')
{!!$event->description!!}

-----------------------
@endcomponent


@component('mail::subcopy')
{{$footer}}
@endcomponent
@endcomponent


