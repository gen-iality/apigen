@component('mail::message')  

<p style="font-size: 15px;color: gray;font-style: italic">
    Felicitaciones tu compra ha sido exitosa
</p>
<p>
    <strong>Tipo de compra:</strong>
    @if($order->item_type == 'discountCode')
        Código de descuento
    @else
        Curso
    @endif
</p>
<p>
    <strong>Valor total:</strong>{{$order->amount}} 
</p>    
  
@endcomponent