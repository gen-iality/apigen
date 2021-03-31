@component('mail::message')

<div style="text-align: center">
	{{ $title }}
</div>
<div style="text-align: center">	
	{!!$desc !!}
</div>
@if ($request_type == 'friendship' && $response)
	<div style="text-align: center">
		@component('mail::button', ['url' => $link . "&response=accepted" , 'color' => 'evius'])
		Aceptar solicitud
		@endcomponent

		@component('mail::button', ['url' => $link . "&response=rejected" , 'color' => 'evius'])
		Rechazar solicitud
		@endcomponent
	</div>
@endif

@if ($request_type == 'meeting' && $response && $status != "accepted" && $status != "rejected")
@component('mail::button', ['url' => $link . "/accept" , 'color' => 'evius'])
Aceptar solicitud
@endcomponent

@component('mail::button', ['url' => $link . "/reject" , 'color' => 'evius'])
Rechazar solicitud
@endcomponent
@endif

<br />
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
@slot('footer')
@component('mail::footer')
© 2001-2020. All Rights Reserved - Evius.co
@endcomponent
@endslot
@endcomponent