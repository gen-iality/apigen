
**Hola {{$eventUser_name}} **, su inscripción se ha realizado con éxito al evento:


<!-- Mensaje configurable desde el CMS en la sección configuración asistentes -->
@if ($event->registration_message )
<a href="{{$link}}">
{!!$event->registration_message!!}
</a>
@endif

<!-- Por si tiene asociado un tickete con sala -->
@if(!empty($eventUser->ticket_title))
<strong>{!! $eventUser->ticket_title!!} </strong>
@endif


<p style="font-size: 15px;color: gray;font-style: italic">
	Se recomienda usar los navegadores Google Chrome, Mozilla Firefox para ingresar,
    algunas caracteristicas pueden no estar disponibles en navegadores no soportados.
</p>
<p style="font-size: 15px;color: gray;font-style: italic">
Si tiene inconvenientes para ingresar a la plataforma o durante las sesiones, no dude en escribirnos al siguiente correo soporte@evius.co  
</p>
  

</div>
@endcomponent