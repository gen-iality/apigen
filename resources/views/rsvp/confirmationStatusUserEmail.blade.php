@component('mail::message')


Hola {{$user->displayName}}!

<div style="text-align: center">
	<span>
        @if($user->status == 'approved')
            <p>Felicitaciones has sido aprobado para ser profesor de nuestra plataforma</p>
        @else
        <p>Lo sentimos no te han aprobado para ser profesor de nuestra plataforma</p>
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