<div role="dialog"  class="modal fade" style="display: none;">
    <style>
        .well.nopad {
            padding: 0px;
        }
        .modal-body .row{
            margin-top:2rem;
        }
    </style>

    <div class="modal-dialog">
        <div class="modal-content">
            {!! Form::open(array('url' => route('postOrderEdit', array('order_id' => $order->id)), 'class' => 'ajax reset closeModalAfter')) !!}
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">
                    <i class="ico-cart"></i>
                    {{ @trans("ManageEvent.edit_order_title", ["order_ref"=>$order->order_reference]) }}
                </h3>
            </div>
            <div class="modal-body">

                <h3>@lang("ManageEvent.order_details")</h3>
                <div class="row">
                    <div class="col-xs-6">
                        <label for="first_name" class="form-control-label">@lang("Attendee.first_name")</label>
                        <input type="text" name="first_name" class="form-control" value="{{ $order->first_name }}">
                    </div>
                    <div class="col-xs-6">
                        <label for="last_name" class="form-control-label">@lang("Attendee.last_name")</label>
                        <input type="text" name="last_name" class="form-control" value="{{ $order->last_name }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <label for="email" class="form-control-label">@lang("Attendee.email")</label>
                        <input type="text" name="email" class="form-control" value="{{ $order->email }}">
                    </div>
                    <div class="col-xs-6">
                        <label for="status" class="form-control-label">Estado</label>
                        <select class="form-control" name="order_status_id">
                        @foreach($orderStatus as $status)
                            @if($status->_id ==  $order->order_status_id ) 
                                <option value="{{$status->_id}}" selected>{{$status->name}}</option>
                            @else
                                <option value="{{$status->_id}}">{{$status->name}}</option>
                            @endif
                        @endforeach
                        </select>
                    </div>
                </div>

                <h3>@lang("ManageEvent.tickets_details")</h3>


                <div class="row">
                    <div class="col-md-12">
                        <div class="ticket_holders_details" >
                            
                            <?php
                                $total_attendee_increment = 0;
                            ?>
                            @foreach($tickets as $index => $ticket)
                                <h4>@lang("Public_ViewEvent.ticket_holder_information") {{$index+1}}</h4>
                                <div class="row">
                                @foreach($ticket->properties as $idx=>$property)
                                    <div class="col-xs-6">
                                        <label for="{{$idx}}" class="form-control-label">{{$idx}}</label>
                                        <input type="text" name="{{$idx}}_{{$index}}" class="form-control" value="{{$property}}">
                                    </div>                                    
                                @endforeach
                                </div>
                            @if(false)
                                @for($i=0; $i<=2; $i++)
                                

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
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>

            </div> <!-- /end modal body-->



            <div class="modal-footer">
                {!! Form::button(trans("ManageEvent.close"), ['class'=>"btn modal-close btn-danger",'data-dismiss'=>'modal']) !!}
                {!! Form::submit(trans("ManageEvent.update_order"), ['class'=>"btn btn-success"]) !!}
            </div>
            {!! Form::close() !!}
        </div><!-- /end modal content-->
    </div>
</div>
