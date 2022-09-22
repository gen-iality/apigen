@component('mail::message')
<table style="font-family:arial;border:1px solid #e8e6e6;border-top:none;border-bottom:none;border-spacing:0;max-width:1000px;color:#000000;border-radius:40px" align="center">
    <thead>
        <tr>
          <td>
                <div class="centered">
                    <img style="width:100%;max-width:600px;border-radius:20px 20px 0 0" 
                        alt="Evius"
                        src={{$image_header}} />  
                </div>
          </td>
      </tr>
    </thead>
    <tbody>
        <tr>
            <td style="font-size:20px;text-align:center;padding:10px;display:block"> 
                ¡Hola {{$eventUser_name}}! El código asociado a la encuesta {{$survey_name}} es el siguiente
                    <b>{{$code}}</b>
                ¡Gracias por participar!
            </td>
         </tr>			 
        <tr>
            <td>
                <div class="centered">
                    <img style="width:100%;max-width:600px;border-radius:0 0 20px 20px" 
                        alt="Evius" 
                        src= {{$image_footer}} />  
                </div>	
            </td>
        </tr>
    </tbody>
</table>
@endcomponent
