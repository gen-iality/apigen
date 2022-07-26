@component('mail::message')

@if(isset($image_header) && !empty($image_header))
<div class="centered">
  <img alt="{{$event->name}}" src={{$image_header}} /> 
</div>
@elseif(!empty($event->styles["banner_image_email"]))
<div class="centered">
<img alt="{{$event->name}}" src={{$event->styles["banner_image_email"]}} /> 
</div>
@elseif(!empty($image_header)){{-- Se cambio la condicion--}}
<div class="centered">
<img alt="{{$event->name}}" src={{$event->styles["banner_image"]}} />  
</div>
@endif


** {{ __('Mail.greeting') }} {{$eventUser_name}}, **
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
|	{{$date_time_from->format('m-d-Y')}}|{{$date_time_from->format('H:i:s')}} |
|	{{$date_time_to->format('m-d-Y')}}|{{$date_time_to->format('H:i:s')}} |
{{-- | {{ $date_time_from->formatLocalized('%A, %e de %B %Y') }}|{{ $date_time_from->formatLocalized('%l:%M %p') }} |
| {{ $date_time_to->formatLocalized('%A, %e de %B %Y') }}|{{ $date_time_to->formatLocalized('%l:%M %p') }} | --}}
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

<div>
	@if(is_null($include_login_button) || $include_login_button == true || $include_login_button != false )
		@component('mail::button', ['url' => $link , 'color' => 'evius'])
			{{ __ ('Mail.enter_event')}}
		@endcomponent
	@endif
</div>

Nota: Recuerda que el acceso es de uso personal y no podrá ser abierto en dos o mas dispositivo al mismo tiempo.



<hr style="border-right : 0;border-left: 0;">

<p style="font-size: 15px;color: gray;font-style: italic">
	{{ __('Mail.recommend_browser') }}
</p>

<hr style="border-right : 0;border-left: 0;">
<div>
	@if(is_null($include_login_button) || $include_login_button == true || $include_login_button != false )
		<p>
			{{ __('Mail.alternative_entry')}}
			<a href="{{$link}}">{{ __('Mail.enter_button')}}</a>
		</p>
	@endif
</div>
<div>	
	<p>
		<a href="{{$linkUnsubscribe}}">{{ __('Mail.unsubscribe')}}</a>
	</p>	
</div>

<div class="centered">
	@if(isset($image_footer) && !empty($image_footer))
		<img alt="{{$event->name}}" src={{$event->styles["banner_footer"]}} /> {{-- se cambio el atributo src--}}
		@elseif(isset($event->styles["banner_footer_email"]) && !empty($event->styles["banner_footer_email"]))
		<img alt="{{$event->name}}" src={{$event->styles["banner_footer_email"]}} />  
		@elseif(isset($event->styles["banner_footer"]) && !empty($image_footer))
		<img alt="{{$event->name}}" src={{$event->styles["banner_footer"]}} />           
		@elseif(isset($organization_picture) && !empty($organization_picture))
		<img alt="{{$event->name}}" src={{$organization_picture}} /> 
	@endif	
</div>


@endcomponent
