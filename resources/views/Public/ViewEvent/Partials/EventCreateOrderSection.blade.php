<section id='order_form' class="container">
    <div class="row">
        <h1 class="section_head">
            @lang("Public_ViewEvent.order_details")
        </h1>
    </div>
    <div class="row">
        <div class="col-md-12" style="text-align: center">
            @lang("Public_ViewEvent.below_order_details_header")
        </div>
        <div class="col-md-4 col-md-push-8">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="ico-cart mr5"></i>
                        @lang("Public_ViewEvent.order_summary")
                    </h3>
                </div>

                <div class="panel-body pt0">
                    <table class="table mb0 table-condensed">
                        @foreach($tickets as $ticket)
                        <tr>
                            <td class="pl0">{{{$ticket['ticket']['title']}}} X <b>{{$ticket['qty']}}</b></td>
                            <td style="text-align: right;">
                                @if((int)ceil($ticket['full_price']) === 0)
                                    @lang("Public_ViewEvent.free")
                                @else
                                    {{ money($ticket['full_price'], $event->currency) }}  
                                @endif
                            </td>
                        </tr>
  
                        @endforeach
                        @foreach($tickets as $ticket)
                            @if((int)ceil($ticket['full_price']) === 0)
                                <?php $is_free = true;  ?>
                            @else
                                <?php $is_free = false; ?>
                                 @break
                            @endif
                        @endforeach
                    </table>
                </div>
                @if($order_total > 0)
                <div class="panel-footer">
                    @if(isset($discount))
                            <h5 style="text-align: center;">Descuento  del <b>{{$percentage_discount}}%</b> por 
                                @if($code_discount)
                                    el código <b>{{$code_discount}}</b>
                                @else
                                    <b>{{$total_ticket_quantity}}</b> tickets
                                @endif
                            </h5>
                        <h5>
                            Precio: <span style="float: right;">${{ number_format($order_total + $discount, 2, '.', '') }} </span>
                        </h5>
                        <h5>
                            Descuento: <span style="float: right;"> - ${{ number_format($discount, 2, '.', '') }} </span>
                        </h5>
                        <hr/>

                    @endif
                    <h5>
                        @lang("Public_ViewEvent.total"): <span style="float: right;"><b>{{ $orderService->getOrderTotalWithBookingFee(true) }}</b></span>
                    </h5>
                    <!-- Esta Parte se encuentra cancelada -->
                    {{--    @if($event->organiser->charge_tax)
                        <h5>
                            {{ $event->organiser->tax_name }} ({{ $event->organiser->tax_value }}%):
                            <span style="float: right;"><b>{{ $orderService->getTaxAmount(true) }}</b></span>
                        </h5>
                        <h5>
                            <strong>Grand Total:</strong>
                            <span style="float: right;"><b>{{  $orderService->getGrandTotal(true) }}</b></span>
                        </h5>
                        @endif
                    --}}
                    <!-- Esta Parte se encuentra cancelada -->

                </div>
                @endif

            </div>
            <div class="help-block">
                {!! @trans("Public_ViewEvent.time", ["time"=>"<span id='countdown'></span>"]) !!}
            </div>
        </div>
        <div class="col-md-8 col-md-pull-4">
            <div class="event_order_form">
                {!! Form::open(['url' => route('postCreateOrder', ['event_id' => $temporal_id]), 'class' => ($order_requires_payment && @$payment_gateway->is_on_site) ? 'ajax payment-form' : 'ajax', 'data-stripe-pub-key' => isset($account_payment_gateway->config['publishableKey']) ? $account_payment_gateway->config['publishableKey'] : '']) !!}

                {!! Form::hidden('event_id', $event->id) !!}
                {!! Form::hidden('temporal_id', $temporal_id) !!}
               

                @if(!$is_free)
                <h3> @lang("Public_ViewEvent.your_information_purshase")</h3>
                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            {!! Form::label("order_first_name", trans("Public_ViewEvent.first_name")) !!}
                            {!! Form::text("order_first_name", null, ['required' => 'required', 'class' => 'form-control', 'pattern' => '^[A-Za-z -]+$']) !!}
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            {!! Form::label("order_last_name", trans("Public_ViewEvent.last_name")) !!}
                            {!! Form::text("order_last_name", null, ['required' => 'required', 'class' => 'form-control', 'pattern' => '^[A-Za-z -]+$']) !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-4">
                        <div class="form-group">
                            {!! Form::label("Document", "Tipo de documento") !!}
                            {!! 
                                Form::select('typeDocument', array(
                                    'CC' => ('Documento de Identidad'),
                                    'TI' => ('TI'),
                                    'PPN'=> ('Pasaporte'),
                                ), null, ['required' => 'required', 'class' => 'form-control']);
                            !!}
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <div class="form-group">
                            {!! Form::label("document", 'Número del documento') !!}
                            {!! Form::number("document", null, ['required' => 'required', 'class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <div class="form-group">
                            {!! Form::label("mobile", 'Teléfono') !!}
                            {!! Form::number("mobile", null, ['required' => 'required', 'class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>

                <div class="row" style="display:none">
                    <div class="col-md-12">
                        <div class="form-group">
                            {!!  Form::checkbox('payerIsBuyer', 'true', true) !!}
                            {!! Form::label("payerIsBuyer", "Los datos ingresados anteriormente son de la persona encargada del pago") !!}
                        </div>  
                    </div>
                </div>
                @else
                <h3> @lang("Public_ViewEvent.your_information")</h3>
                <div class="row">
                    <div class="col-xs-2">
                        <b>@lang("Public_ViewEvent.first_name") </b>
                    </div>
                    <div class="col-xs-10">
                        {{Auth::user()->displayName}}
                    </div>
                </div>

                 <div class="row">
                    <div class="col-xs-2">
                        <b> @lang("Public_ViewEvent.email") </b>
                    </div>
                    <div class="col-xs-10">
                        {{Auth::user()->email}}
                    </div>
                </div>
                <br>
                @endif

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {!!  Form::checkbox('terms', 'true') !!}
                            {!! Form::label("terms", "Acepta terminos y condiciones") !!}
                        </div>
                    </div>
                </div>

                <div class="p20 pl0" style="display:none">
                    <a href="javascript:void(0);" class="btn btn-primary btn-xs" id="mirror_buyer_info">
                        @lang("Public_ViewEvent.copy_buyer")
                    </a>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="ticket_holders_details" >
                            
                            <?php
                                $total_attendee_increment = 0;
                            ?>
                            @foreach($tickets as $ticket)
                                @for($i=0; $i<=$ticket['qty']-1; $i++)
                                <h3>@lang("Public_ViewEvent.ticket_holder_information") {{$i+1}}</h3>

                                <div class="panel panel-primary">

                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <b>{{$ticket['ticket']['title']}}</b>: @lang("Public_ViewEvent.ticket_holder_n", ["n"=>$i+1])
                                        </h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            @foreach($fields as $field)
                                                <div class="col-xs-6">
                                                    <div class="form-group">
                                                        @if($field['mandatory'] == 'true')
                                                            @if(isset( $field['label']))
                                                                {!! Form::label($field['name'], $field['label']) !!}
                                                            @else
                                                                {!! Form::label($field['name'], $field['name']) !!}
                                                            @endif
                                                            {!! Form::text("tiket_holder_{$field['name']}[{$i}][{$ticket['ticket']['id']}]", null, ['required' => 'required', 'class' => 'form-control']) !!}
                                                        @else
                                                        @if(isset( $field['label']))
                                                            {!! Form::label($field['name'], $field['label']) !!}
                                                        @else
                                                            {!! Form::label($field['name'], $field['name']) !!}
                                                        @endif
                                                        {!! Form::text("tiket_holder_{$field['name']}[{$i}][{$ticket['ticket']['id']}]", null, ['class' => 'form-control']) !!}
                                                        @endif
                                                    </div>
                                                </div>
                                            @endforeach
                                            @include('Public.ViewEvent.Partials.AttendeeQuestions', ['ticket' => $ticket['ticket'],'attendee_number' => $total_attendee_increment++])
                                        </div>
                                    </div>


                                </div>
                                @endfor
                            @endforeach
                        </div>
                    </div>
                </div>

                <style>
                    .offline_payment_toggle {
                        padding: 20px 0;
                    }
                </style>

                @if($order_requires_payment)

        
                @if($event->enable_offline_payments)
                    <div class="offline_payment_toggle">
                        <div class="custom-checkbox">
                            <input data-toggle="toggle" id="pay_offline" name="pay_offline" type="checkbox" value="1">
                            <label for="pay_offline">@lang("Public_ViewEvent.pay_using_offline_methods")</label>
                        </div>
                    </div>
                    <div class="offline_payment" style="display: none;">
                        <h5>@lang("Public_ViewEvent.offline_payment_instructions")</h5>
                        <div class="well">
                            {!! Markdown::parse($event->offline_payment_instructions) !!}
                        </div>
                    </div>

                @endif


                @if(@$payment_gateway->is_on_site)
                    <div class="online_payment">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::label('card-number', trans("Public_ViewEvent.card_number")) !!}
                                    <input required="required" type="text" autocomplete="off" placeholder="**** **** **** ****" class="form-control card-number" size="20" data-stripe="number">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="form-group">
                                    {!! Form::label('card-expiry-month', trans("Public_ViewEvent.expiry_month")) !!}
                                    {!!  Form::selectRange('card-expiry-month',1,12,null, [
                                            'class' => 'form-control card-expiry-month',
                                            'data-stripe' => 'exp_month'
                                        ] )  !!}
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    {!! Form::label('card-expiry-year', trans("Public_ViewEvent.expiry_year")) !!}
                                    {!!  Form::selectRange('card-expiry-year',date('Y'),date('Y')+10,null, [
                                            'class' => 'form-control card-expiry-year',
                                            'data-stripe' => 'exp_year'
                                        ] )  !!}</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::label('card-expiry-year', trans("Public_ViewEvent.cvc_number")) !!}
                                    <input required="required" placeholder="***" class="form-control card-cvc" data-stripe="cvc">
                                </div>
                            </div>
                        </div>
                    </div>

                @endif

                @endif

                @if($event->pre_order_display_message)
                <div class="well well-small">
                    {!! nl2br(e($event->pre_order_display_message)) !!}
                </div>
                @endif

                <!-- aca verificamos si el stage esta activo dentro de las fechas -->

                @if(($event->seats_configuration)['status'])
                <div id="chart"></div>
                <script>
                    var chart = new seatsio.SeatingChart({
                            divId: 'chart',
                            event :                 "{!! $data_seats['event'] !!}",  
                            publicKey :             "{!! $data_seats['publicKey'] !!}",
                            language :              "{!! $data_seats['language'] !!}",
                            availableCategories :   {!! json_encode($data_seats['availableCategories']) !!},
                            maxSelectedObjects:     {!! json_encode($data_seats['maxSelectedObjects']) !!},
                            selectedObjects:        {!! json_encode($data_seats['selectedObjects']) !!},
                            showMinimap: true,
                            onObjectSelected: function(object){
                                var url = '/checkout/seats';
                                var data = { data: object, order_reference: '{!! $temporal_id !!}' };

                                fetch(  url, {
                                        method: 'POST', // or 'PUT'
                                        body: JSON.stringify(data), // data can be `string` or {object}!
                                        headers:{
                                            'Content-Type': 'application/json'
                                        }
                                }).then(res => res.json())
                                .catch(error => console.error('Error:', error))
                                .then(response => console.log('Success:', response));
                                
                            },
                            onObjectDeselected: function(object){
                                var url = '/checkout/seats';
                                var data = { data: object, order_reference: '{!! $temporal_id !!}' };

                                fetch(  url, {
                                        method: 'POST', // or 'PUT'
                                        body: JSON.stringify(data), // data can be `string` or {object}!
                                        headers:{
                                            'Content-Type': 'application/json'
                                        }
                                }).then(res => res.json())
                                .catch(error => console.error('Error:', error))
                                .then(response => console.log('Success:', response));
                            }
                        }).render();

                </script>
                @endif


               {!! Form::hidden('is_embedded', $is_embedded) !!}
               {!! Form::submit(trans("Public_ViewEvent.checkout_submit"), ['class' => 'btn btn-lg btn-success card-submit', 'style' => 'width:100%;']) !!}

            </div>
        </div>
        @if(!$is_free)
        <div class="col-md-12"><br>
            <a href="https://www.placetopay.com" target="_blank"><img class="" src="{{asset('assets/images/public/EventPage/credit-card-logos.png')}}"/></a>
        </div>
        @endif
    </div>
</section>
@if(session()->get('message'))
    <script>showMessage('{{session()->get('message')}}');</script>
@endif

