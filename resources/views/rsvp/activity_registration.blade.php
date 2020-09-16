@component('mail::message') 
<div class="centered"> 
* Tu registro ha sido exitoso a:  {{$activity->name}}
</div>
<div class="centered">
<img src="{{$activity->image}}"></img>
</div>
@endcomponent

