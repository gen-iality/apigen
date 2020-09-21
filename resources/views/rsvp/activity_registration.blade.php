@component('mail::message') 
<div class="centered"> 

<h2>Confirmación de registro a {{$activity->name}}</h2>

<!-- Mensaje personalizado del CMS -->
@if ($activity->registration_message)
{!!$activity->registration_message!!}
@endif
</div>

<div class="centered">
<img src="{{$activity->image}}"></img>
</div>

<p style="font-size: 15px;color: gray;font-style: italic">
Si tiene algúna duda o inconveniente, no dude en escribirnos al siguiente correo soporte@evius.co  
</p>
@endcomponent

