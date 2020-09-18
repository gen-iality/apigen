@component('mail::message') 
<div class="centered"> 

<h2>Su registro ha sido exitoso a:  {{$activity->name}}</h2>

<!-- Mensaje personalizado del CMS -->
@if ($activity->registration_message)
{!!$activity->registration_message!!}
@endif


</div>

<div class="centered">
<img src="{{$activity->image}}"></img>
</div>
@endcomponent

