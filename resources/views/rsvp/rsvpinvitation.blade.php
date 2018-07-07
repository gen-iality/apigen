@component('mail::message')


<p>Evius necesita que confirmes asistencia a</p>


@component('mail::panel')
Evento: {{$event->name}}
@endcomponent

<p>{{$event->description}}</p>


@component('mail::button', ['url' => '', 'color' => 'green'])
Confirmar asistencia
@endcomponent

@component('mail::table')
| Laravel       | Table         | Example  |
| ------------- |:-------------:| --------:|
| Col 2 is      | Centered      | $10      |
| Col 3 is      | Right-Aligned | $20      |
@endcomponent

@endcomponent


