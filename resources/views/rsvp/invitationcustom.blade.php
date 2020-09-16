@component('mail::message')  
**Hola {{$eventUser_name}} **, su inscripción se ha realizado con éxito al evento:


<!-- Mensaje configurable desde el CMS en la sección configuración asistentes -->
<!-- @if ($event->registration_message )
<a href="{{$link}}" target="_blank">
{!!$event->registration_message!!}
</a>
@endif -->

@if ($event->registration_message )

[![Creative Commons License](https://firebasestorage.googleapis.com/v0/b/coltest-eb7de.appspot.com/o/imagemckinsey.png?alt=media&token=4a77a418-6bda-4f19-9e15-2c9369cf6b2d)]({{$link}})


@endif

<!-- Por si tiene asociado un tickete con sala -->
@if(!empty($eventUser->ticket_title))
<strong>{!! $eventUser->ticket_title!!} </strong>
@endif

<p style="font-size: 15px;color: gray;font-style: italic">
Si tiene inconvenientes para ingresar a la plataforma o durante las sesiones, no dude en escribirnos al siguiente correo soporte@evius.co  
</p>
  

</div>
@endcomponent