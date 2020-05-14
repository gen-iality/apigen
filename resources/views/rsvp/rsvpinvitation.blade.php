@component('mail::message')

Hola {{$eventUser_name}}, estas inscrito en: {{$event->name}}


<div style="text-align: center;font-size: 130%;">
    <p style="font-size: 130%">Para ingresar al evento, asistir a la conferencia, ver mas informacion visitanos en:
        @component('mail::button', ['url' => $link , 'color' => 'evius'])
        Ingresar al Evento AQUÍ
        @endcomponent
        <br>
        Te esperamos.
    </p><br><br>
    <p style="font-size: 15px;color: gray;font-style: italic;">
    Se recomienda usar los navegadores Google Chrome, Safari o Mozilla Firefox para ingresar a evius, no se recomienda el uso de internet explorer. 
    </p>
    
    <p>
    @component('mail::promotion')

    ![Logo]({{$image}})
    Si tuviste problemas con el botón de ingreso abre el siguiente enlace
    <a href="{{$link}}">click acá</a>
    Recuerda usar Google Chrome, Safari o Mozilla Firefox.
        
    @endcomponent

</div>
<div style="text-align: center;font-size: 100%;background-color:#ECECEC;padding:20px">
        <p>Si experimentas problemas al ingresar con los métodos anteriores dale click al botón a continuación "Ingresar a EVIUS" e ingresa el siguiente usuario y contraseña 
        <br>Tus datos de acceso son:<br>
        Usuario: {{$email}}
        <br>
        Contraseña: {{$password}}
        <br>
        @component('mail::button', ['url' => 'https://eviusauth.netlify.app/' , 'color' => 'evius'])
        Ingresar a EVIUS
        @endcomponent
        
        </p>
    

</div>

@endcomponent