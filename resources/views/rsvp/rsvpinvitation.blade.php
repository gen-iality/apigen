@component('mail::message')
.
{{$event->name}}
----------------

![alt text](https://picsum.photos/600/200 "Logo Title Text 1")



@component('mail::promotion')
Hola juan, estas invitad@ al 
Lanzamiento de Mitika

@component('mail::button', ['url' => url('/api/rsvp/confirmrsvp/'.$eventUser->id), 'color' => 'green'])
Confirmar asistencia
@endcomponent

@endcomponent


@component('mail::panel')
{{$event->description}}
-----------------------
@endcomponent
@component('mail::table')
| Cuando          | Lugar         | 
| -------------   |:-------------:| 
| Fecha:          | Dirección:      | 
| jueves          | Calle 93 #19-55      | 
| julio 12, 2018  | WeWork de la 93 | 
| Hora:           | Centered      | 
| 06:00 p.m.      | Centered      | 

@endcomponent

@component('mail::button', ['url' => url('/api/rsvp/confirmrsvp/'.$eventUser->id), 'color' => 'green'])
Confirmar asistencia
@endcomponent

@endcomponent


