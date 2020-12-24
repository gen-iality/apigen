@component('mail::message')  
<div class="centered">
    <p style="font-size: 20px;color: gray;font-style: italic">
        ¡Felicitaciones! tu compra ha sido exitosa                      
    </p>
</div>
<div>    
    {{$order->data}}       
</div>  
@endcomponent