{{-- @component('mail::message')  

    
    

    

    
@endcomponent --}}

@component('mail::message')  
{{-- @if(!empty($event->styles["banner_image_email"]))
<div class="centered">
<img alt="{{$event->name}}" src={{$event->styles["banner_image_email"]}} /> 
</div>
@elseif(!empty($event->styles["banner_image"]))
<div class="centered">
<img alt="{{$event->name}}" src={{$event->styles["banner_image"]}} />  
</div>
@endif --}}
<br />
<br />
¡Bienvenid@! tu registro en Ucrónio ha sido exitoso.
<br />


<hr style="border-right : 0;border-left: 0;" />

<p style="font-size: 15px;color: gray;font-style: italic">
    Se recomienda usar los navegadores Google Chrome, Mozilla Firefox para ingresar,
    algunas caracteristicas pueden no estar disponibles en navegadores no soportados.
</p>
<p style="font-size: 15px;color: gray;font-style: italic">
    Si tiene inconvenientes para ingresar a la plataforma o durante las sesiones, no dude en escribirnos al siguiente correo soporte@evius.co  
</p>

{{-- <div class="centered">
    @if(isset($image_footer) && !empty($image_footer))
        ![Logo]({{!empty($image_footer)}})
        <img alt="{{$event->name}}" src={{$image_footer}} /> 
    @elseif(isset($event->styles["banner_footer_email"]) && !empty($event->styles["banner_footer_email"]))
        <img alt="{{$event->name}}" src={{$event->styles["banner_footer_email"]}} />  
    @elseif(isset($event->styles["banner_footer"]) && !empty($event->styles["banner_footer"]))
        <img alt="{{$event->name}}" src={{$event->styles["banner_footer"]}} />           
    @elseif(isset($organization_picture) && !empty($organization_picture))
        <img alt="{{$event->name}}" src={{$organization_picture}} />           
    @endif
</div> --}}

@endcomponent