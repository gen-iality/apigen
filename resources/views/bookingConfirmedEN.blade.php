@component('mail::message')

{{$event->description}}
<img src="https://firebasestorage.googleapis.com/v0/b/eviusauth.appspot.com/o/output-onlinepngtools%20(6).png?alt=media&token=106a0f27-a2f8-48f8-a19b-9a936aac420a">
 <!-- ![Evius]({{$logo}}) -->
Hi {{$eventuser_name}}, you have been invited to {{$event->name}} event
<div style="text-align: justify">
    <span>
    <!--Here you can find the event information
        Aquí podrás encontrar la información del evento y el
        código QR que deberás presentar a la entrada para
        ingresar rápidamente al evento. Puedes mostrarlo
        desde tu smartphone o si prefieres imprime el archivo
        PDF adjunto.-->
    </span>
</div>
<br />
<!-- <img src="https://api.evius.co/api/generatorQr/{{$eventuser_id}}"> -->

<div style="text-align: center">
<!-- <img style=" display:block; margin:0 50px; text-align: center" src="{{$qr}}" /> -->
</div>

@component('mail::table')   
| **Ticket Type:**            | **Price:**                                                                       |
|<hr style="background-color:white;color:white">|<hr style="background-color:white;color:white">|
|VIP | Invitation |
|<br>|<br>
| **Date Start:**             | **Time Start:**                                                                 |
|<hr style="background-color:white;color:white">|<hr style="background-color:white;color:white">|
| {{ date('l, F j Y ', strtotime($event->datetime_from)) }} | {{date('H:i:s', strtotime($event->datetime_from)) }} |
|<br>|<br>

@endcomponent


@component('mail::panel')
Venue<br>

{{$event->venue}} <br>
{{$event_address}} <br>
{{$event_city}}<br>
-----------------------
@endcomponent


<!-- Click aqui
@component('mail::button', ['url' => url('/api/rsvp/confirmrsvp/5bb64a02c065863d470263a8'), 'color' => 'evius'])
Confirmar Cuenta
@endcomponent -->

@component('mail::subcopy')
@endcomponent

[Privacy policies](https://evius.co/privacy) | 
[Terms and Conditions](https://evius.co/terms)

<div style="text-align: center">
    <span>
        You received this email because you are enrolled in a
        event managed by Evius.co or you are
        registered on the Evius.co portal
    </span>
</div>
<div style="text-align: center">
    <span>

    </span>
    <span></span>
</div>
@slot('footer')
@component('mail::footer')
        © 2001-2018. All Rights Reserved - Evius.co
        is a registered trademark of MOCION
@endcomponent
@endslot
@endcomponent
