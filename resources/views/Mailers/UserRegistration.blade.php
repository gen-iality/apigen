@component('mail::message')
<table style="font-family:arial;border:1px solid #e8e6e6;border-top:none;border-bottom:none;border-spacing:0;max-width:1000px;color:#000000;border-radius:40px" align="center">
		<thead>
			<tr>
			  <td>
					<div class="centered">
						<img style="width:100%;max-width:600px;border-radius:20px 20px 0 0" alt="Evius" src="https://firebasestorage.googleapis.com/v0/b/eviusauth.appspot.com/o/evius%2FViews%2FHeader%20Animado.gif?alt=media&token=f4f341e9-64e9-4c92-9b9b-a81d4d023698" />  
					</div>
			  </td>
		  </tr>
		</thead>
		<tbody>
			<tr>
				<td style="font-size:20px;text-align:center;padding:10px;display:block"> 
					¡{{$user->names}} te damos la bienvenida!
				</td>
			 </tr>
             <tr>
				<td style="font-size:14px;text-align:left;padding:10px;display:block"> 
					Gracias por registrarte en Evius, estamos encantados de que te hayas unido a nosotros.<br/>
                    Ingresa <a href="https://app.evius.co">aquí</a> para disfrutar de tus eventos.
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
					<div class="centered">
						<img style="width:100%;max-width:600px;border-radius:0 0 20px 20px" alt="Evius" src="https://firebasestorage.googleapis.com/v0/b/eviusauth.appspot.com/o/evius%2FViews%2Ffooter.png?alt=media&token=0aada277-fdec-458f-9016-b66ab2282a9e"/>  
					</div>	
				</td>
			</tr>
		</tbody>
	</table>
@endcomponent		