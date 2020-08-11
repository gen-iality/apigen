@component('mail::message')
@if(!empty($event->styles["banner_image_email"]))
<div class="centered">
![Logo]({{$event->styles["banner_image_email"]}})
@elseif(!empty($event->styles["banner_image"]))
![Logo]({{$event->styles["banner_image"]}})
</div>
@endif
<br />
<br />
**Hola {{$eventUser_name}} **, su inscripción se ha realizado con éxito al evento:
<b>{{$event->name}}</b>
<!-- Mensaje configurable desde el CMS en la sección configuración asistentes -->
@if ($event->registration_message )
{!!$event->registration_message!!}
@endif
<!-- Por si tiene asociado un tickete con sala -->
@if(!empty($eventUser->ticket_title))
<strong>{!! $eventUser->ticket_title!!} </strong>
@endif


<!--@if(!empty($eventUser->ticket))
# ** Sala: {{$eventUser->ticket->title}} **
@endif
-->
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

<!--
@component('mail::button', ['url' => $link , 'color' => 'evius'])
Ingresar al Evento AQUÍ
@endcomponent
-->
@if (!empty($image))
<div class="centered">
	<img src="{{ $image }}">
</div>
<br>
@endif
<!-- ** Para ingresar al evento, asistir a las conferencias y ver más información visítanos en: ** -->
@component('mail::button', ['url' => $link , 'color' => 'evius'])
Ingresar al Evento AQUÍ
@endcomponent


<p style="font-size: 15px;color: gray;font-style: italic">
	Se recomienda usar los navegadores Google Chrome, Mozilla Firefox para ingresar,
    algunas caracteristicas pueden no estar disponibles en navegadores no soportados.
    Si tiene inconvenientes para ingresar a la plataforma o durante las sesiones, no dude en escribirnos al siguiente correo soporte@evius.co    
</p>

<hr style="border-right : 0;border-left: 0;" />
<p>
	Si tiene problemas con el botón de ingreso abra el siguiente enlace
	<a href="{{$link}}">click acá</a>
</p>

<div class="centered">
@if(isset($image_footer) && !empty($image_footer))
![Logo]({{!empty($image_footer)}})
<img src={{$image_footer}} />
@elseif(isset($image_footer_default) && !empty($image_footer_default))
<img src={{$image_footer_default}} />
@elseif(isset($organization_picture) && !empty($organization_picture))
<img src={{$organization_picture}} />
@endif

</div>

@endcomponent