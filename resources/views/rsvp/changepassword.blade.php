@component('mail::message')  
**Hola {{$eventUser_name}} **, su cambio de contraseña se ha realizado con éxito.

Su nueva contraseña es: {{$password}}

Inicie sesión haciendo click en la siguiente enlace:
	<a href="{{$link}}">click acá</a>
</p>

<p style="font-size: 15px;color: gray;font-style: italic">
Si tiene inconvenientes para ingresar a la plataforma o durante las sesiones, no dude en escribirnos al siguiente correo soporte@evius.co  
</p>
  
</div>
@endcomponent