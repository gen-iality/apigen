@component('mail::message')  
**Hola {{$eventUser_name}} **, su link de ingreso se ha generado con exito.


Inicie sesión haciendo:
<p>
	<a href="{{$link}}">click acá</a>
</p>



<p style="font-size: 15px;color: gray;font-style: italic">
Si tiene inconvenientes para ingresar a la plataforma o durante las sesiones, no dude en escribirnos al siguiente correo soporte@evius.co  
</p>
  
</div>
@endcomponent