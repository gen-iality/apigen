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

    <a href="{{'https://evius.co/landing/'.$event->id }}">{{$event->name}}</a>

</div>

@endcomponent