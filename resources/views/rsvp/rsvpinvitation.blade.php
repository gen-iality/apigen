@component('mail::message')

@if(!empty($image_header))
![Logo]({{$image_header}})<br>
@else
![Logo]({{$event->styles["banner_image"]}})
@endif
** Hola {{$eventUser_name}}, está inscrito en: {{$event->name}}   **

@if(!empty($content_header))
{!!$content_header!!}
@else
@endif


{{-- //Formato para la fecha se encuentra en: https://www.php.net/manual/es/function.strftime.php --}}
@component('mail::table')
| | |
| -------------------- |:--------------------------------------------------------------------------------------:|
| **Fecha:** | **Hora:** |
| {{ \Carbon\Carbon::parse($event->datetime_from)->formatLocalized('%A, %e de %B %Y') }} | {{ \Carbon\Carbon::parse($event->datetime_from)->formatLocalized('%l:%M %p') }} |


@if (false)
@if($event->datetime_to)
| **Hasta:** | **Hora:** |
| {{ \Carbon\Carbon::parse($event->datetime_to)->formatLocalized('%A, %e de %B %Y') }} | {{ \Carbon\Carbon::parse($event->datetime_to)->formatLocalized('%l:%M %p') }} |
@endif
@endif
@endcomponent

@component('mail::button', ['url' => $link , 'color' => 'evius'])
Ingresar al Evento AQUÍ
@endcomponent

@component('mail::promotion')
![Logo]({{$image}})
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


##Te esperamos.


@endcomponent