@component('mail::message')


Hola {{$user->displayName}}!

<div style="text-align: center">
	<span>
        @if($event->status == 'approved')
            <p>Felicitaciones tu curso {{$event->name}} ha sido aprobado para ser publicado</p>
        @else
        <p>Lo sentimos tu curso <strong>{{$event->name}}</strong> ha sido rechazado para ser publicado</p>
        @endif
    </span>
    <hr style="border-right : 0;border-left: 0;" />
    <p style="font-size: 15px;color: gray;font-style: italic">
        Se recomienda usar los navegadores Google Chrome, Mozilla Firefox para ingresar,
        algunas caracteristicas pueden no estar disponibles en navegadores no soportados.
    </p>
    <p style="font-size: 15px;color: gray;font-style: italic">
    Si tiene inconvenientes para ingresar a la plataforma o durante las sesiones, no dude en escribirnos al siguiente correo soporte@evius.co  
    </p>
</div>



@slot('footer')
@component('mail::footer')
© All Rights Reserved - Evius.co
@endcomponent
@endslot
@endcomponent