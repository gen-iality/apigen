@component('mail::message')

{{$event->name}}

@slot('footer')
<img style="width:100%;height:auto;" src="https://firebasestorage.googleapis.com/v0/b/eviusauth.appspot.com/o/bancolombia%2FCORTADO_LandingBID_LandingESP3.jpg?alt=media&token=ba7c6679-4d6e-4be8-91e2-e71b94562aad">

@component('mail::footer')

        © 2001-2020. All Rights Reserved - Evius.co
        is a registered trademark of MOCION
@endcomponent
@endslot
@endcomponent
