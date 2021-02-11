@component('mail::message')

@if(!empty($image_header))

![Logo]({{$image_header}})<br>

@endif


<<<<<<< HEAD
** {{ __('Mail.greeting') }} {{$eventUser_name}}, **
=======
Hola {{$eventUser_name}},
>>>>>>> 0d425bae6c7b0e830b4f4e9e1062e46b0654ea58
@if(!empty($content_header) && $content_header != '<p><br></p>')
{!!$content_header !!}
@endif


@if(is_null($include_date) || $include_date == true || $include_date != false )
@if($ticket_title)
{{-- ha sido invitado a: --}}
<strong>{!! $ticket_title !!}</strong>
@endif

{{-- //Formato para la fecha se encuentra en: https://www.php.net/manual/es/function.strftime.php --}}
@component('mail::table')
| | |
| -------------------- |:--------------------------------------------------------------------------------------:|
| **{{ __('Mail.date') }}:** | **{{ __('Mail.hora') }}:** |
| {{ $date_time_from->formatLocalized('%A, %e de %B %Y') }}|{{ $date_time_from->formatLocalized('%l:%M %p') }} |
@endcomponent
@endif

<div style="text-align: center">
	@if($event->type_event == "physicalEvent")
		<img  src="{{$qr}}" />
	{{-- @else
		@component('mail::button', ['url' => $link , 'color' => 'evius'])
			Ingresar al Evento AQUÍ
		@endcomponent --}}
	@endif
</div>



<div class="centered">
@if(!empty($image))
<img alt="{{$event->name}}" src="{{ $image }}">
@endif
</div>

@if(!empty($message) && $message != '<p><br></p>')
{!!$message!!}
@endif
@if ($event->registration_message && $type == "newuser" )
{!!$event->registration_message!!}
@endif
@component('mail::button', ['url' => $link , 'color' => 'evius'])
{{ __ ('Mail.enter_event')}}
@endcomponent

@if(is_null($include_login_button) || $include_login_button == true || $include_login_button != false )
	@component('mail::button', ['url' => $link , 'color' => 'evius'])
		Ingresar al Evento AQUÍ
	@endcomponent
@endif

<hr style="border-right : 0;border-left: 0;">
<p style="font-size: 15px;color: gray;font-style: italic">
	{{ __('Mail.recommend_browser') }}
</p>

@if(is_null($include_login_button) || $include_login_button == true || $include_login_button != false )
<hr style="border-right : 0;border-left: 0;">
	<p>
		{{ __('Mail.alternative_entry')}}
		<a href="{{$link}}">{{ __('Mail.enter_button')}}</a>
	</p>
@endif


<div class="centered">
	@if(isset($image_footer) && !empty($image_footer))
		<!-- ![Logo]({{!empty($image_footer)}}) -->
		<img alt="{{$event->name}}" src={{$image_footer}} /> 
	@elseif($organization_picture != null)s
		<img alt="{{$event->name}}" src={{$organization_picture}} /> 	
	@endif
</div>


@endcomponent
