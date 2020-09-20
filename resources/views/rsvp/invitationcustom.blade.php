@component('mail::message')  
**Hola {{$eventUser_name}} **, su inscripción se ha realizado con éxito al evento:


<!-- Mensaje configurable desde el CMS en la sección configuración asistentes -->
<!-- @if ($event->registration_message )
<a href="{{$link}}" target="_blank">
{!!$event->registration_message!!}
</a>
@endif -->

<a href="{{$link}}"><img src="https://firebasestorage.googleapis.com/v0/b/eviusauth.appspot.com/o/MckinseyRegistroImagen.jpeg?alt=media&token=8b5ff869-8215-47af-9098-770d3131ead6"/> </a>


<!-- Por si tiene asociado un tickete con sala -->
@if(!empty($eventUser->ticket_title))
<strong>{!! $eventUser->ticket_title!!} </strong>
@endif

<p>
	Si tiene problemas con el ingreso abra el siguiente enlace
	<a href="{{$link}}">click acá</a>
</p>

<p style="font-size: 15px;color: gray;font-style: italic">
Si tiene inconvenientes para ingresar a la plataforma o durante las sesiones, no dude en escribirnos al siguiente correo soporte@evius.co  
</p>
  

</div>
@endcomponent