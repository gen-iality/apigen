<script>
        document.domain = "evius.co"
</script>
<style>
body {font-family: Arial;}

/* Style the tab */
.tab {
  overflow: hidden;
  background-color: white;
  margin-left: 0.8%;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: #EEEEEF;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  /* transition: 0.3s; */
  font-size: 1.2em;
  color: black;
  font-weight: bold;
  margin-top: 10px;
  border-bottom: solid 3px #00f0be;
  border-left: solid 1px black;
}

/* Change background color of buttons on hover */
a:hover {
  background-color: #bfbfbf;
  color: #00f0be;
  cursor: pointer;
}

p.active{
  background-color: #428bca;
  font-family: Montserrat,sans-serif;
  padding: 4%;
  color: white;
  font-size: 16px;
  text-align: center;
}
p.calender{
 font-family: Montserrat,sans-serif;
  padding: 6%;
  font-size: 16px;
}

/* Create an active/current tablink class */

button.active p small {
  color: black;
}


/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 0px;
  /* border: 1px solid #ccc; */
  border-top: none;
}
.sub-titulo{
    color: #a2a2a2;
}

td{
    border-color:transparent !important;
}
.td{
    border-top: none !important;
}
.ticket{
    height: 80px;
    box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.1);
    border-radius: 10px 10px 10px 10px;
}
.espacio{
    height: 0px;
    padding: 5px !important;
    background-color: transparent !important;
}
.content{
    padding: 0 !important;
}
.precio{
    width:200px; 
    text-align: right;
}
.cantidad{
    width: 85px;
}
.button-purchase {
  position: fixed;
  z-index: 998;
  bottom: 0px;
  left:1%;
  width: 98%;
  height: 40px;
  line-height: 20px;
  text-align: center;
  background-color: #00f0be;
  border-color: transparent;
  color: white !important;
  font-size: 2.5rem;
  border-radius: 15px;
  font-weight: bold;
  border-radius: 10px 10px 10px 10px;
  text-transform: uppercase;
}
.button-purchase:hover{
    transition: 0.7s;
    background-color: #13cea8 !important;
}



@media screen and (max-width: 600px) {
       table {
           width:100%;
       }
       thead {
           display: none;
       }
       tr td:first-child {
           background-color: white;
       }
       tbody td {
           display: block;
           text-align:center;
       }
        .precio{
            width:100%; 
            text-align:center;
        }
        .cantidad{
            width: 100%;
        }
        .tab button {
            width: 94%;
            margin-left: 3%;
            cursor: pointer;
            padding: 14px 16px;
            margin-top: 5px;
            border-left: none;
            border-radius: 5px 5px 5px 5px;
        }
        .tab button.active {
            border-radius: 5px 5px 5px 5px;
        }
        .tab {
            margin-left: 0;
        }
}

</style>

<!-- EN ESTE LUGAR SE CARGA EL TITULO CADA UNO DE LOS TABS-->
<!-- Si el stage esta en las fechas correspondientes se coloca la clase active-->
@if(isset($stages))
<div class="tab" style="font-family:Montserrat,sans-serif">
<ul class="nav">
    <div class="row" style="background-color: #8080800a">

    
    @foreach($stages as $key => $stage) 
    <div class="col-sm-3">
        <!-- aca verificamos si el stage esta activo dentro de las fechas -->
        @php $class_tab_active = ($key == $stage_act) ? 'active': ''; @endphp
        <li class="nav-item">
        <a class="nav-link" onclick="openCity(event, '{{$key}}')" style="font-family:Montserrat,sans-serif">   
            @if(is_null($event->stage_continue))
            <p class="{{$class_tab_active}} tab-{{$key}}">
                {{$stage['title']}} <br>
                <small style="font-size: 1rem;">
                    Desde: {{$event->stage_continue}} <?php echo date('d F', strtotime($stage["start_sale_date"])); ?>
                </small> <br>
                 <small style="font-size: 1rem;">
                    Hasta: <?php echo date('d F Y', strtotime($stage["end_sale_date"])); ?>
                </small>
            </p>
            @else
            <p class="{{$class_tab_active}} tab-{{$key}} calender">
                {{$stage['title']}} <br>
            </p>
            @endif
            
        </a>
        </li>
    </div>
    @endforeach
    </div>
</ul>
</div>

<!-- EN ESTE LUGAR SE CARGA LA INFORMACIÓN DE CADA UNO DE LOS TABS-->
<!-- Si el stage esta en las fechas correspondientes se coloca los estilos para visualizar el tab-->
@foreach($stages as $key => $stage) 

@if(is_null($event->stage_continue)) <!-- Si el evento tiene limite de compra entre etapas -->
    @php $styles_tab_active = ($key == $stage_act) ? 'display: block': 'display: none';  @endphp
    <div id="{{$key}}" class="tabcontent" style="{{$styles_tab_active}}" >
    @if($tickets->count() > 0)

        {!! Form::open(['url' => route('postValidateTickets', ['event_id' => $event->id]), 'class' => 'ajax']) !!}

            <div class="col-md-12">
                    <div class="content">
                        <div class="tickets_table_wrap">
                        @if(isset($event->codes_discount))
                            <div id="codes_discount">                          
                            </div>
                        @endif
                            <table class="table">
                                <?php
                                $is_free_event = true;
                                ?>
                                @foreach($tickets as $ticket)
                                    @if($ticket->stage_id == $stage["stage_id"])
                                    <tr class="ticket" property="offers" typeof="Offer" >
                                        <td class="td" >
                                            <span class="ticket-title semibold" property="name">
                                                {{$ticket->title}}
                                            </span>
                                            <p class="ticket-descripton mb0 text-muted" property="description">
                                                {{$ticket->description}}
                                            </p>
                                        </td>
                                        <td class="td precio">
                                            <div class="ticket-pricing">
                                                @if($ticket->is_free)
                                                    @lang("Public_ViewEvent.free")
                                                    <meta property="price" content="0">
                                                @else
                                                    
                                                    <?php
                                                    $is_free_event = false;
                                                    ?>
                                                    <span title='{{money($ticket->price, $event->currency)}} @lang("Public_ViewEvent.ticket_price") + {{money($ticket->total_booking_fee, $event->currency)}} @lang("Public_ViewEvent.booking_fees")'>{{money($ticket->total_price, $event->currency)}} </span>
                                                    {{--  <span class="tax-amount text-muted text-smaller">{{ ($event->organiser->tax_name && $event->organiser->tax_value) ? '(+'.money(($ticket->total_price*($event->organiser->tax_value)/100), $event->currency).' '.$event->organiser->tax_name.')' : '' }}</span> --}}
                                                    <meta property="priceCurrency"
                                                        content="{{ $event->currency->code }}">
                                                    <meta property="price"  
                                                        content="{{ number_format($ticket->price, 2, '.', '') }}">
                                                    {{$ticket->currency}}
                                                @endif
                                            </div>
                                        </td>
                                        <td class="td cantidad">
                                            @if($ticket->is_paused)

                                                <span class="text-danger">
                                                    @lang("Public_ViewEvent.currently_not_on_sale")
                                                </span>

                                                    @else

                                                    @if($ticket->sale_status === config('attendize.ticket_status_sold_out'))
                                                        <span class="text-danger" property="availability" content="http://schema.org/SoldOut">
                                                    @lang("Public_ViewEvent.sold_out")
                                                </span>
                                                    @elseif($ticket->sale_status === config('attendize.ticket_status_before_sale_date'))
                                                                    <span class="text-danger">
                                                    @lang("Public_ViewEvent.sales_have_not_started")
                                                </span>
                                                    @elseif($ticket->sale_status === config('attendize.ticket_status_after_sale_date'))
                                                        <span class="text-danger">
                                                    @lang("Public_ViewEvent.sales_have_ended")
                                                </span>
                                                @else
                                                    {!! Form::hidden('tickets[]', $ticket->id) !!}
                                                    <meta property="availability" content="http://schema.org/InStock">
                                                    @if($key == $stage_act)
                                                        <select name="ticket_{{$ticket->id}}" class="form-control tickets"
                                                                style="text-align: center; border-bottom: solid 3px #00f0be;">
                                                            @if ($tickets->count() > 1)
                                                                <option value="0">0</option>
                                                            @endif
                                                            @for($i=$ticket->min_per_person; $i<=$ticket->max_per_person; $i++)
                                                                <option value="{{$i}}">{{$i}}</option>
                                                            @endfor
                                                        </select>
                                                    @endif
                                                @endif

                                            @endif
                                        </td>
                                    </tr>
                                    <!-- este tr es para dar espacio entre las celtas -->
                                    <tr class="espacio">
                                        <td class="espacio"></td>
                                    </tr>
                                    @endif
                                @endforeach
                                @if($key == $stage_act)
                                   
                                    <tr>
                                        <td colspan="3" style="text-align: center">
                                        @if(Auth::user())
                                            @lang("Public_ViewEvent.below_tickets")
                                        @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        @if(isset($event->tickets_discount) && $event->tickets_discount != 0)
                                        <td  colspan="3" style="text-align: center;">
                                        <div class="alert alert-success" role="alert" style="background-color: #3273dc !important; color: white !important">
                                            Recibe el <b>{{$event->percentage_discount}}% </b> de descuento en el total de tu compra, al momento de seleccionar más de <b>{{$event->tickets_discount}}</b> tiquetes para el evento
                                        </div>
                                        </td>
                                        @endif
                                    </tr>
                                @endif
                                    <tr class="checkout">
                                        <td colspan="3">
                                            @if(!$is_free_event && $key == $stage_act)
                                                <div class="">
                                                
                                                    @if($event->enable_offline_payments)
                                                        
                                                        <div class="help-block" style="font-size: 11px;">
                                                            @lang("Public_ViewEvent.offline_payment_methods_available")
                                                        </div>
                                                    @endif
                                                </div>

                                            @endif
                                            @if(Auth::user() && $key == $stage_act)
                                                {!!Form::submit(trans("Public_ViewEvent.register"), ['class' => 'button-purchase'])!!}
                                            @endif
                                            
                                        </td>
                                    </tr>
                            </table>
                        </div>
                </div>
            </div>
        {!! Form::hidden('is_embedded', $is_embedded) !!}
        {!! Form::close() !!}

    </div>
    @else
        <div class="alert alert-boring">
            @lang("Public_ViewEvent.tickets_are_currently_unavailable")
        </div>
    @endif


@else <!-- Si no tiene  limite de compra entre etapas-->
    @php $styles_tab_active = ($key == $stage_act) ? 'display: block': 'display: none';  @endphp
    <div id="{{$key}}" class="tabcontent" style="{{$styles_tab_active}}" >
    @if($tickets->count() > 0)

        {!! Form::open(['url' => route('postValidateTickets', ['event_id' => $event->id]), 'class' => 'ajax']) !!}

            <div class="col-md-12">
                    <div class="content">
                        <div class="tickets_table_wrap">
                        @if(isset($event->codes_discount))
                            <div id="codes_discount">                          
                            </div>
                        @endif
                            <table class="table">
                                <?php
                                $is_free_event = true;
                                ?>
                                @foreach($tickets as $ticket)
                                    @if($ticket->stage_id == $stage["stage_id"])
                                    <tr class="ticket" property="offers" typeof="Offer" >
                                        <td class="td" >
                                            <span class="ticket-title semibold" property="name">
                                                {{$ticket->title}}
                                            </span>
                                            <p class="ticket-descripton mb0 text-muted" property="description">
                                                {{$ticket->description}}
                                            </p>
                                        </td>
                                        <td class="td precio">
                                            <div class="ticket-pricing">
                                                @if($ticket->is_free)
                                                    @lang("Public_ViewEvent.free")
                                                    <meta property="price" content="0">
                                                @else
                                                    
                                                    <?php
                                                    $is_free_event = false;
                                                    ?>
                                                    <span title='{{money($ticket->price, $event->currency)}} @lang("Public_ViewEvent.ticket_price") + {{money($ticket->total_booking_fee, $event->currency)}} @lang("Public_ViewEvent.booking_fees")'>{{money($ticket->total_price, $event->currency)}} </span>
                                                    {{--  <span class="tax-amount text-muted text-smaller">{{ ($event->organiser->tax_name && $event->organiser->tax_value) ? '(+'.money(($ticket->total_price*($event->organiser->tax_value)/100), $event->currency).' '.$event->organiser->tax_name.')' : '' }}</span> --}}
                                                    <meta property="priceCurrency"
                                                        content="{{ $event->currency->code }}">
                                                    <meta property="price"  
                                                        content="{{ number_format($ticket->price, 2, '.', '') }}">
                                                    {{$ticket->currency}}
                                                @endif
                                            </div>
                                        </td>
                                        <td class="td cantidad">
                                            @if($ticket->is_paused)

                                                <span class="text-danger">
                                                    @lang("Public_ViewEvent.currently_not_on_sale")
                                                </span>

                                                    @else

                                                    @if($ticket->sale_status === config('attendize.ticket_status_sold_out'))
                                                        <span class="text-danger" property="availability" content="http://schema.org/SoldOut">
                                                    @lang("Public_ViewEvent.sold_out")
                                                </span>
                                                    @elseif($ticket->sale_status === config('attendize.ticket_status_before_sale_date'))
                                                                    <span class="text-danger">
                                                    @lang("Public_ViewEvent.sales_have_not_started")
                                                </span>
                                                    @elseif($ticket->sale_status === config('attendize.ticket_status_after_sale_date'))
                                                        <span class="text-danger">
                                                    @lang("Public_ViewEvent.sales_have_ended")
                                                </span>
                                                @else
                                                    {!! Form::hidden('tickets[]', $ticket->id) !!}
                                                    <meta property="availability" content="http://schema.org/InStock">
                                                    @if($key >= $stage_act)
                                                        <select name="ticket_{{$ticket->id}}" class="form-control tickets"
                                                                style="text-align: center; border-bottom: solid 3px #00f0be;">
                                                            @if ($tickets->count() > 1)
                                                                <option value="0">0</option>
                                                            @endif
                                                            @for($i=$ticket->min_per_person; $i<=$ticket->max_per_person; $i++)
                                                                <option value="{{$i}}">{{$i}}</option>
                                                            @endfor
                                                        </select>
                                                    @endif
                                                @endif

                                            @endif
                                        </td>
                                    </tr>
                                    <!-- este tr es para dar espacio entre las celtas -->
                                    <tr class="espacio">
                                        <td class="espacio"></td>
                                    </tr>
                                    @endif
                                @endforeach
                                
                                    <tr>
                                        <td colspan="3" style="text-align: center">
                                        @if(Auth::user())
                                            @lang("Public_ViewEvent.below_tickets")
                                        @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        @if(isset($event->tickets_discount) && $event->tickets_discount != 0)
                                        <td  colspan="3" style="text-align: center;">
                                        <div class="alert alert-success" role="alert" style="background-color: #3273dc !important; color: white !important">
                                            Recibe el <b>{{$event->percentage_discount}}% </b> de descuento en el total de tu compra, al momento de seleccionar más de <b>{{$event->tickets_discount}}</b> tiquetes para el evento
                                        </div>
                                        </td>
                                        @endif
                                    </tr>
                                    <tr class="checkout">
                                        <td colspan="3">
                                            @if(!$is_free_event)
                                                <div class="">
                                                
                                                    @if($event->enable_offline_payments)
                                                        
                                                        <div class="help-block" style="font-size: 11px;">
                                                            @lang("Public_ViewEvent.offline_payment_methods_available")
                                                        </div>
                                                    @endif
                                                </div>

                                            @endif
                                            @if(Auth::user())
                                                {!!Form::submit(trans("Public_ViewEvent.register"), ['class' => 'button-purchase'])!!}
                                            @endif
                                            
                                        </td>
                                    </tr>
                            </table>
                        </div>
                </div>
            </div>
            {!! Form::hidden('is_embedded', $is_embedded) !!}
            {!! Form::close() !!}
           
    </div> 
    @else
        <div class="alert alert-boring">
            @lang("Public_ViewEvent.tickets_are_currently_unavailable")
        </div>
    @endif
            
@endif            
@endforeach
@else
    <span class="text-danger">
        @lang("Public_ViewEvent.sales_have_not_started")
    </span>
@endif 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<script>
function openCity(evt, key) {
    console.log(evt, key)
 evt.currentTarget.className += " active";

  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("p");
  for (i = 0; i < tablinks.length; i++) {
    // tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(key).style.display = "block";
  $('p.active').removeClass("active")
  $('p.tab-'+key).addClass("active")
}



$(document).ready(function(){

$("select.tickets").change(function(){
    var total = 0;
    var total_select = 0;
    $("select.tickets").each(function(){
        var total_select = parseInt($(this).val());
        total += total_select
    });
    if(total == 1){
        $("div#codes_discount").append(`
        
        
        <div class="card" style="border-color: #72f0bf; border-style: dotted;">
            <div class="card-header">
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                <input type="text" name="code_discount" class="form-control" placeholder="Si tiene un código promocional, puede ingresarlo en este campo" style="border-color: #72f0bf;">
                <center><footer class="blockquote-footer">Código promocional</footer></center>
                </blockquote>
            </div>
        </div>

        
        `)
    }else{
        $("div#codes_discount").empty()
    }
});
});
</script>
