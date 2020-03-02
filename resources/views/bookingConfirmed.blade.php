@component('mail::message')

{{$event->name}}
<img src="https://firebasestorage.googleapis.com/v0/b/eviusauth.appspot.com/o/bancolombia%2FLandingBID_LandingESP3.jpg?alt=media&token=7179d085-133d-4852-bed2-24e8e76a5c45">

@slot('footer')
@component('mail::footer')
        © 2001-2018. All Rights Reserved - Evius.co
        is a registered trademark of MOCION
@endcomponent
@endslot
@endcomponent
