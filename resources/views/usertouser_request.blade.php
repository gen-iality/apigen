@component('mail::message')
<div>
@if(isset($image_banner) && !empty($image_banner))
<img alt="{{$event->name}}" src={{$image_banner}} /> 
@endif
</div>
{{-- <div style="text-align: center">
	<span>
		{{ $title }} 
	</span>
</div> --}}

<div style="text-align: center">				
	{!!$desc !!}			
</div>


@component('mail::button', ['url' => $link_authenticatedalevento, 'color' => 'evius'])
Ver Solicitudes en el Evento
@endcomponent

<!-- Click aqui
@component('mail::button', ['url' => url('/api/rsvp/confirmrsvp/5bb64a02c065863d470263a8'), 'color' => 'evius'])
Confirmar Cuenta
@endcomponent -->

[Políticas de privacidad](https://evius.co/privacy) |
[Términos y Condiciones](https://evius.co/terms)

<div style="text-align: center">
	<span>
		Recibiste este correo porque estás inscrito y/o invitado en un
		evento gestionado a través de Evius.co o te has
		registrado en el portal de Evius.co
	</span>
</div>
@if(isset($image_footer) && !empty($image_footer))
<img alt="{{$event->name}}" src={{$image_footer}} /> 
@endif
</div>
@endcomponent
