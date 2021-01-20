@component('mail::message')  
@if(!empty($event->styles["banner_image_email"]))
<div class="centered">
<img alt="{{$event->name}}" src={{$event->styles["banner_image_email"]}} /> 
</div>
@elseif(!empty($event->styles["banner_image"]))
<div class="centered">
<img alt="{{$event->name}}" src={{$event->styles["banner_image"]}} />  
</div>
@endif
<br />
<br />
** {{ __ ('Mail.saludo')}} {{$eventUser_name}}**, {{ __ ('Mail.inscripcion_exitosa')}}:
<b>{{$event->name}}</b>
{{-- //Formato para la fecha se encuentra en: https://www.php.net/manual/es/function.strftime.php --}}
<!-- @component('mail::table')
| | |
| -------------------- |:--------------------------------------------------------------------------------------:|
| **Fecha:** | **Hora:** |
| {{ \Carbon\Carbon::parse($event->datetime_from)->formatLocalized('%A, %e de %B %Y') }} | {{ \Carbon\Carbon::parse($event->datetime_from)->formatLocalized('%r') }} |

 
@if (false)
@if($event->datetime_to)
| **Hasta:** | **Hora:** |
| {{ \Carbon\Carbon::parse($event->datetime_to)->formatLocalized('%A, %e de %B %Y') }} | {{ \Carbon\Carbon::parse($event->datetime_to)->formatLocalized('%l:%M %p') }} |
@endif
@endif
@endcomponent -->

<!-- Mensaje configurable desde el CMS en la sección configuración asistentes -->
@if ($event->registration_message )

{!!$mensajepersonalizado!!}

@endif
<!-- Por si tiene asociado un tickete con sala -->
@if(!empty($eventUser->ticket_title))
<strong>{!! $eventUser->ticket_title!!} </strong>
@endif


<!--@if(!empty($eventUser->ticket))
# ** Sala: {{$eventUser->ticket->title}} **
@endif
-->


<!--
@component('mail::button', ['url' => $link , 'color' => 'evius'])
Ingresar al Evento AQUÍ
@endcomponent
-->
@if (!empty($image))
<div class="centered">
	<img alt="{{$event->name}}" src="{{ $image }}">
</div>
<br>
@endif
<!-- ** Para ingresar al evento, asistir a las conferencias y ver más información visítanos en: ** -->
<div style="text-align: center">
	@if($event->type_event == "physicalEvent")
		<img  src="{{$qr}}" />
	@else
		@component('mail::button', ['url' => $link , 'color' => 'evius'])
			{{ __('Mail.ingresar_al_evento') }}
		@endcomponent
	@endif
</div>


<p style="font-size: 15px;color: gray;font-style: italic">
	{{ __ ('Mail.recomendar_navegador')}}
</p>
<p style="font-size: 15px;color: gray;font-style: italic">
	{{ __ ('Mail.correo_soporte')}}
</p>
  

<hr style="border-right : 0;border-left: 0;" />
<p>
	{{ __ ('Mail.alternativa_ingreso')}}
	<a href="{{$link}}">{{ __('Mail.boton_ingreso') }}</a>
</p>

<div class="centered">
@if(isset($image_footer) && !empty($image_footer))
![Logo]({{!empty($image_footer)}})
<img alt="{{$event->name}}" src={{$image_footer}} /> 
@elseif(isset($event->styles["banner_footer_email"]) && !empty($event->styles["banner_footer_email"]))
<img alt="{{$event->name}}" src={{$event->styles["banner_footer_email"]}} />  
@elseif(isset($event->styles["banner_footer"]) && !empty($event->styles["banner_footer"]))
<img alt="{{$event->name}}" src={{$event->styles["banner_footer"]}} />           
@elseif(isset($organization_picture) && !empty($organization_picture))
<img alt="{{$event->name}}" src={{$organization_picture}} />           
@endif

</div>
@endcomponent
