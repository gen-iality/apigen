@component('mail::message') 
<div class="centered"> 
* Tu registro ha sido exitoso a {{$activity->name}}
</div>
<br/>
<div class="centered">
<img src="{{$activity->image}}"></img>
</div>
@endcomponent

