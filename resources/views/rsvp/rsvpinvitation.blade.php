@component('mail::message')
{{$event->name}}
----------------

![Logo]({{$image}})

@component('mail::promotion')
Hola, {{$eventUser->user->name}}
{{$message}}

@component('mail::button', ['url' => url('/api/rsvp/confirmrsvp/'.$eventUser->id), 'color' => 'evius'])
Confirmar asistencia
@endcomponent

@endcomponent

@component('mail::panel')
{{$event->description}}
-----------------------
@endcomponent
@component('mail::table')
|                       |                                                                                        | 
| --------------------  |:--------------------------------------------------------------------------------------:| 
| **Fecha:**            | **Hora:**                                                                              | 
| {{ date('l, F j Y ', strtotime($event->datetime_from)) }} | {{date('H:s', strtotime($event->datetime_from)) }} |
|<br>                   |<br>  
@if($event->datetime_to)
| **Hasta:**            | **Hora:**                                                                              | 
| {{ date('l, F j Y ', strtotime($event->datetime_from)) }} | {{date('H:s', strtotime($event->datetime_to)) }}   | 
@endif

@endcomponent

@component('mail::panel')
Ubicación del evento  <br>

{{$event_location}}
-----------------------
@endcomponent



@component('mail::button', ['url' => url('/api/rsvp/confirmrsvp/'.$eventUser->id), 'color' => 'evius'])
Confirmar asistencia
@endcomponent

@component('mail::subcopy')
{{$footer}}
@endcomponent


@endcomponent



