@component('mail::message')

@if(!empty($image_header))

![Logo]({{$image_header}})<br>

@endif


** Hola {{$eventUser_name}}, **
@if(!empty($content_header) && $content_header != '<p><br></p>')
{!!$content_header !!}
@endif


@if(is_null($include_date) || $include_date == true || $include_date != false )
@if($ticket_title)
ha sido invitado a:
<strong>{!! $ticket_title !!}</strong>
@endif

{{-- //Formato para la fecha se encuentra en: https://www.php.net/manual/es/function.strftime.php --}}
@component('mail::table')
| | |
| -------------------- |:--------------------------------------------------------------------------------------:|
| **Fecha:** | **Hora:** |
| {{ $date_time_from->formatLocalized('%A, %e de %B %Y') }}|{{ $date_time_from->formatLocalized('%l:%M %p') }} |
@endcomponent
@endif


@if(!empty($image))
<img src="{{ $image }}">
@endif

@if(!empty($message) && $message != '<p><br></p>')
{!!$message!!}
@endif
@if ($event->registration_message && $type == "newuser" )
{!!$event->registration_message!!}
@endif
@component('mail::button', ['url' => $link , 'color' => 'evius'])
Ingresar al Evento AQUÃ
@endcomponent


<p style="font-size: 15px;color: gray;font-style: italic">
	Se recomienda usar los navegadores Google Chrome, Mozilla Firefox para ingresar,
	algunas caracteristicas pueden no estar disponibles en navegadores no soportados.
</p>

<hr style="border-right : 0;border-left: 0;">
<p>
	Si tiene problemas con el botÃ³n de ingreso abra el siguiente enlace
	<a href="{{$link}}">click acÃ¡</a>
</p>


@if($image_footer != null)
![Logo]({{$image_footer}})
@elseif($organization_picture != null)
![Logo]({{$organization_picture}})
@else
@endif

@endcomponent