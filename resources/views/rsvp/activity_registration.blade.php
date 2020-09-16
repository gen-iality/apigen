@component('mail::message') 
<div class="centered"> 
<p>Tu registro ha sido exitoso a:  {{$activity->name}}</p>
</div>
<br/>
<div class="centered">
<img src="{{$activity->image}}"></img>
</div>
@endcomponent

