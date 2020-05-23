@component('mail::message')

Hola {{$eventUser_name}}, estás inscrito en: {{$event->name}}

@component('mail::promotion')
![Logo]({{$event->styles["banner_image"]}})
@endcomponent


@if ($event->registration_message)

<div>
    {{$event->registration_message}}
</div>

@else

@component('mail::table')
| | |
| -------------------- |:--------------------------------------------------------------------------------------:|
| **Fecha:** | **Hora:** |
| {{ date('l, F j Y ', strtotime($event->datetime_from)) }} | {{date('H:i:s', strtotime($event->datetime_from)) }} |
|<br> |<br>
@if($event->datetime_to)
| **Hasta:** | **Hora:** |
| {{ date('l, F j Y ', strtotime($event->datetime_from)) }} | {{date('H:i:s', strtotime($event->datetime_to)) }} |
@endif
@endcomponent

@endif

<div style="text-align: center;font-size: 130%;">

    <p style="font-size: 130%">Para ingresar al evento, asistir a la conferencia y ver más información visítanos en:
        @component('mail::button', ['url' => $link , 'color' => 'evius'])
        Ingresar al Evento AQUÍ
        @endcomponent

        <br>
        Te esperamos.
    </p><br><br>


    {!!$event->description!!}



    <p style="font-size: 15px;color: gray;font-style: italic;">
        Se recomienda usar los navegadores Google Chrome, Safari o Mozilla Firefox para ingresar a evius, no se
        recomienda el uso de internet explorer.
    </p>
    <hr style="border-right : 0;border-left: 0;">
    <p>
        Si tuviste problemas con el botón de ingreso abre el siguiente enlace
        <a href="{{$link}}">click acá</a>
        Recuerda usar Google Chrome, Safari o Mozilla Firefox.

        @component('mail::promotion')

        ![Logo]({{$image}})

        @endcomponent


</div>

@endcomponent