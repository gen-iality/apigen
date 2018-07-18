@component('mail::message')
.
{{$event->name}}
----------------

![alt text]({{$image}} "Logo Title Text 1")



@component('mail::promotion')
{{$message}}

@component('mail::button', ['url' => url('/api/rsvp/confirmrsvp/'.$eventUser->id), 'color' => 'green'])
Confirmar asistencia
@endcomponent

@endcomponent


@component('mail::panel')
{{$event->description}}
-----------------------
@endcomponent
@component('mail::table')
| Cuando                | Lugar              | 
| --------------------  |:------------------:| 
| Fecha:                |                    | 
| {{$event->date_start}}|  {{$event->venue}} | 
|  Hora:                | Dirección:         |
|  {{$event->hour}}     |{{$event->location}}| 

@endcomponent

@component('mail::button', ['url' => url('/api/rsvp/confirmrsvp/'.$eventUser->id), 'color' => 'green'])
Confirmar asistencia
@endcomponent

@endcomponent


