@component('mail::message') 
<div class="centered"> 


<!-- Mensaje personalizado del CMS -->
@if ($activity->registration_message)
<p>{{$activity->registration_message}}</p>
@endif

<p>Tu registro ha sido exitoso a:  {{$activity->name}}</p>

</div>

<div class="centered">
<img src="{{$activity->image}}"></img>
</div>
@endcomponent

