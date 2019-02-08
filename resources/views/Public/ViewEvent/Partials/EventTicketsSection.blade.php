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
.tab button:hover {
  background-color: white;
  color: #00f0be;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #00f0be;
  color:white;
  font-size: 1.3em;
  margin-top: 6px;
  border-radius: 10px 10px 0px 0px;
  border-left: 0;
}

.tab button.active p small {
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
    @foreach($stages as $key => $stage) 
        <!-- aca verificamos si el stage esta activo dentro de las fechas -->
        @php $class_tab_active = ($key == $stage_act) ? 'active': ''; @endphp
        <button class="tablinks {{$class_tab_active}}" onclick="openCity(event, '{{$key}}')" style="font-family:Montserrat,sans-serif">   
            {{$stage['title']}} <br>
            <p class="nm "><small class="sub-titulo "> <?php echo date('d F', strtotime($stage["start_sale_date"])); ?> /  <?php echo date('d F Y', strtotime($stage["end_sale_date"])); ?></small></p>
        </button>
    @endforeach
</div>

<!-- EN ESTE LUGAR SE CARGA LA INFORMACIÓN DE CADA UNO DE LOS TABS-->
<!-- Si el stage esta en las fechas correspondientes se coloca los estilos para visualizar el tab-->
@foreach($stages as $key => $stage) 
    @php $styles_tab_active = ($key == $stage_act) ? 'display: block': 'display: none';  @endphp
    <div id="{{$key}}" class="tabcontent" style="{{$styles_tab_active}}" >

    @if($tickets->count() > 0)

        {!! Form::open(['url' => route('postValidateTickets', ['event_id' => $event->id]), 'class' => 'ajax']) !!}

            <div class="col-md-12">
                    <div class="content">
                        <div class="tickets_table_wrap">
                            <table class="table">
                                <?php
                                $is_free_event = true;
                                ?>
                                @foreach($tickets as $ticket)
                                    @if($ticket->stage == $stage["title"])
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
                                                                    <span class="text-danger" property="availability"
                                                                        content="http://schema.org/SoldOut">
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
                                                        <select name="ticket_{{$ticket->id}}" class="form-control"
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
                                                    {!!Form::submit(trans("Public_ViewEvent.register"), ['class' => 'btn btn-lg button-purchase'])!!}
                                                @endif
                                            
                                        </td>
                                    </tr>
                            </table>
                        </div>
                </div>
            </div>
        {!! Form::hidden('is_embedded', $is_embedded) !!}
        {!! Form::close() !!}

    @else
        <div class="alert alert-boring">
            @lang("Public_ViewEvent.tickets_are_currently_unavailable")
        </div>

    @endif









    </div>
@endforeach
@else
    <span class="text-danger">
        @lang("Public_ViewEvent.sales_have_not_started")
    </span>
@endif 
<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>