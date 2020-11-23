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

<div class="centered">
@if(!empty($image))
<img alt="{{$event->name}}" src="{{ $image }}">
@endif
</div>

@if(!empty($message) && $message != '<p><br></p>')
{!!$message!!}
@endif
@if ($event->registration_message && $type == "newuser" )
{!!$event->registration_message!!}
@endif
@component('mail::button', ['url' => $link , 'color' => 'evius'])
Ingresar al Evento AQUÍ
@endcomponent


<p style="font-size: 15px;color: gray;font-style: italic">
	Se recomienda usar los navegadores Google Chrome, Mozilla Firefox para ingresar,
	algunas caracteristicas pueden no estar disponibles en navegadores no soportados.
</p>

<hr style="border-right : 0;border-left: 0;">
<p>
	Si tiene problemas con el botón de ingreso abra el siguiente enlace
	<a href="{{$link}}">Click aquí</a>
</p>


<div class="centered">
@if(isset($image_footer) && !empty($image_footer))
<!-- ![Logo]({{!empty($image_footer)}}) -->
<<<<<<< HEAD
<img src={{$image_footer}} /> 
@elseif($organization_picture != null)
![Logo]({{$organization_picture}})
<img src={{$organization_picture}} /> 
=======
<img alt="{{$event->name}}" src={{$image_footer}} /> 
@elseif($organization_picture != null)
![Logo]({{$organization_picture}})
<img alt="{{$event->name}}" src={{$organization_picture}} /> 
>>>>>>> 8da708f1b48a264c9a91469b0a5045f662ab2e08
@else
@endif
</div>


@endcomponent
