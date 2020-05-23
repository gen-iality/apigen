@component('mail::message')

![Logo]({{$event->styles["banner_image"]}})

** Hola {{$eventUser_name}}, su registro a {{$event->name}}  ha sido exitoso **

En la parte inferior del correo encontraras un botón para ingresar al evento

@component('mail::table')
| | |
| -------------------- |:--------------------------------------------------------------------------------------:|
| **Fecha:** | **Hora:** |
| {{ date('l, F j Y ', strtotime($event->datetime_from)) }} | {{date('H:i:s', strtotime($event->datetime_from)) }} |

@if (false)
@if($event->datetime_to)
| **Hasta:** | **Hora:** |
| {{ date('l, F j Y ', strtotime($event->datetime_from)) }} | {{date('H:i:s', strtotime($event->datetime_to)) }} |
@endif
@endif
@endcomponent

@if ($event->registration_message)
{!!$event->registration_message!!}
@else
{!!$event->description!!}
@endif


** Para ingresar al evento, asistir a las conferencias y ver más información visítanos en: **
@component('mail::button', ['url' => $link , 'color' => 'evius'])
Ingresar al Evento AQUÍ
@endcomponent


<p style="font-size: 15px;color: gray;font-style: italic;">
Se recomienda usar los navegadores Google Chrome, Mozilla Firefox para ingresar, 
algunas caracteristicas pueden no estar disponibles en navegadores no soportados.
</p>

<hr style="border-right : 0;border-left: 0;">
<p>
Si tuviste problemas con el botón de ingreso abre el siguiente enlace
<a href="{{$link}}">click acá</a>
</p>

@component('mail::promotion')
![Logo]({{$image}})
@endcomponent

##Te esperamos.


@endcomponent