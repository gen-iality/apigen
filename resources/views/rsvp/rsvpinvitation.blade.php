@component('mail::message')
{{$event->name}}
----------------

![Logo]({{$image}})



@component('mail::promotion')
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
|                       |                     | 
| --------------------  |:-------------------:| 
| **Fecha:**            | **Lugar:**          | 
| {{$event->date_start}}| {{$event->venue}}   | 
|  &npsp;               |  &npsp;             |
| **Hora:**             | **Dirección:**      |
| {{$event->hour}}      | {{$event->location}}| 

@endcomponent

@component('mail::button', ['url' => url('/api/rsvp/confirmrsvp/'.$eventUser->id), 'color' => 'evius'])
Confirmar asistencia
@endcomponent

@endcomponent


