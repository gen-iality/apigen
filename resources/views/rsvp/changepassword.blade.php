@component('mail::message')  
**Hola {{$eventUser_name}} **, su cambio de contraseña se ha realizado con éxito.

Su nueva contraseña es: {{$password}}

Inicie sesión haciendo click en la siguiente imagen:

<a href="{{$link}}"><img src="https://firebasestorage.googleapis.com/v0/b/eviusauth.appspot.com/o/MckinseyRegistroImagen.jpeg?alt=media&token=8b5ff869-8215-47af-9098-770d3131ead6"/> </a>


<p>
	Si tiene problemas con el ingreso abra el siguiente enlace
	<a href="{{$link}}">click acá</a>
</p>

<p style="font-size: 15px;color: gray;font-style: italic">
Si tiene inconvenientes para ingresar a la plataforma o durante las sesiones, no dude en escribirnos al siguiente correo soporte@evius.co  
</p>
  
</div>
@endcomponent