@component('mail::message')
<table style="font-family:arial;border:1px solid #e8e6e6;border-top:none;border-bottom:none;border-spacing:0;max-width:1000px;color:#707173;border-radius:40px" align="center">
		<thead>
			<tr>
			  <td>
				@if(!empty($event->styles["banner_image_email"]))
					<div>
						<img style="width:100%;max-width:600px;border-radius:20px 20px 0 0"  alt="{{$event->name}}" src={{$event->styles["banner_image_email"]}} /> 
					</div>
				@elseif(!empty($event->styles["banner_image"]))
					<div class="centered">
						<img style="width:100%;max-width:600px;border-radius:20px 20px 0 0" alt="{{$event->name}}" src={{$event->styles["banner_image"]}} />  
					</div>
				@endif
			  </td>
		  </tr>
		</thead>
		<tbody>
			<tr>
				<td style="font-size:20px;text-align:center;padding:10px;display:block"> 
					Hola {{$user->names}}
				</td>
			 </tr>
			 <tr>
				<td style="font-size:14px;text-align:left;padding:10px;display:block">
					Estás recibiendo este correo por que tu (o alguien más) ha solicitado reestablecer la contraseña de tu cuenta {{$user->email}}.
                    <br/> 
                    Si es así, por favor, has click en el siguiente link o copialo en tu navegador:				
				</td>
			 </tr>
			 <tr>
				<td style="font-size:17px;text-align:center;padding:10px;display:block">
					<a href="{{$link}}">{{ __('Mail.enter_button')}}</a>			
				</td>
			 </tr>
			 <tr>
				<td style="font-size:14px;text-align:left;padding:10px;display:block">
					Recuerda que el link de cambio de contraseña funciona una sola vez.			
				</td>
			 </tr>
			 <tr>
				<hr style="border-right : 0;border-left: 0;" />
			</tr>
			 <tr>
				<td style="font-size:13px;text-align:left;padding:10px;display:block"> 
					Se recomienda usar los navegadores Google Chrome, Mozilla Firefox para ingresar, algunas características pueden no estar disponibles en navegadores no soportados
			   </td>
			</tr>        
			<tr>            
				<td style="font-size:13px;text-align:center;padding:10px;display:block"> 
					Si tiene inconvenientes para ingresar a la plataforma o durante las sesiones, no dude en escribirnos al siguiente correo soporte@evius.co
			   </td>
			</tr>						 
			 <tr>
				<td>
					@if(!empty($event->styles["banner_footer_email"]))
						<div class="centered">
							<img style="width:100%;max-width:600px;border-radius:0 0 20px 20px" alt="{{$event->name}}" src={{$event->styles["banner_footer_email"]}} /> 
						</div>
					@elseif(!empty($event->styles["banner_footer"]))
						<div class="centered">
							<img style="width:100%;max-width:600px;border-radius:0 0 20px 20px" alt="{{$event->name}}" src={{$event->styles["banner_footer"]}} />  
						</div>
					@endif
				</td>
			</tr>
		</tbody>
	</table>
@endcomponent		