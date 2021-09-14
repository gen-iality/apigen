@component('mail::message')  
<div class="centered">
    <p style="font-size: 20px;color: gray;font-style: italic">
        ¡Felicitaciones! tu redención de puntos ha sido exitosa                       
    </p>
</div>
@if(!empty($organizer->footer_image_email))
    <div class="centered">
        <img alt="{{$organizer->name}}" src={{$organizer->footer_image_email}} /> 
    </div>
@endif
@endcomponent
