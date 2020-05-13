@component('mail::message')

Hola {{$eventUser_name}}, estas inscrito en: {{$event->name}}


<div style="text-align: center;font-size: 130%;">
    <p style="font-size: 130%">Para ingresar al evento y ver mas informacion visitanos en:
        @component('mail::button', ['url' => $link , 'color' => 'evius'])
        Ingresar a al Evento AQUÍ
        @endcomponent
        Tus datos de acceso son:<br>

        Usuario: {{$email}}
        <br>
        Código: {{$password}}
        <br>
        Te esperamos.
    </p>
    <p>
    @component('mail::promotion')

    ![Logo]({{$image}})
        
    @endcomponent
        <a href="{{$link}}">{{$event->name}}</a>
    </p>

</div>

@endcomponent