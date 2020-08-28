@component('mail::message')  
**Hola {{$eventUser_name}} **, su inscripción se ha realizado con éxito  en DuncanVille:
<a target="_blank" href="https://llegaduncanville.com/">
@if(!empty($event->styles["banner_image_email"]))
<div class="centered">
<img src={{$event->styles["banner_image_email"]}} /> 
</div>
@elseif(!empty($event->styles["banner_image"]))
<div class="centered">
<img src={{$event->styles["banner_image"]}} />  
</div>
@endif
</a>
<a target="_blank" href="https://llegaduncanville.com/">https://llegaduncanville.com/</a>
@endcomponent