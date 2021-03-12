@component('mail::message')


¡Bienvenid@! tu registro en {{$organization->displayName}} ha sido exitoso.

@if(isset($user->others_properties['role']))
<div style="text-align: center">
	<span>
        @if($user->others_properties['role'] == 'teacher')
            <p>
                Tu perfil ha sido creado. 
                En un plazo de 48 horas cómo máximo podrás revisar si tu perfil fue aceptado para poder empezar a crear cursos. 
                Gracias por querer ser parte de la comunidad de docentes de {{$organization->displayName}}!
            </p>
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
@endif



@slot('footer')
@component('mail::footer')
© All Rights Reserved - Evius.co
@endcomponent
@endslot
@endcomponent