<div class="row">
    <div class="col-md-12">
        <div id="codes_discount">
        <table class="table codes_discount">
            <thead>
                <tr>
                <th scope="col">Código</th>
                <th scope="col">Porcentaje</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Disponible</th>
                </tr>
            </thead>
            <tbody>
                @foreach($codes_discount as $code)
                <tr class="3z3m5p3y">
                    <td>{{$code['id']}}</td>
                    <td>{{$code['percentage']}}</td>
                    @if(isset($code['quantity']))
                        <td>{{$code['quantity']}}</td>
                    @else
                        <td>Undefined</td>
                    @endif
                    
                    <td>
                        @if($code['available'])
                            true
                        @else
                            false
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
</div>


{!! Form::model($account, array('url' => route('postEditCodesPromocional'), 'class' => 'ajax showCodes')) !!}
{{ Form::hidden('event_id', $event_id) }}

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('codes_title', trans("ManageAccount.codes_title"), array('class'=>'control-label required')) !!}
            {!! Form::text('codes_title', null, array('class'=>'form-control control-label required')) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('tickets_availability', trans("ManageAccount.codes_availability"), array('class'=>'control-label required')) !!}
            {!! Form::selectRange('tickets_availability', 0, 100, $ticket_discount , array('class'=>'form-control control-label required')) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('percentage_discount', trans("ManageAccount.percentage_discount"), array('class'=>'control-label required')) !!}
            {!! Form::selectRange('percentage_discount', 0, 100, null,  array('class'=>'form-control control-label required', 'placeholder' => '%')) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel-footer">
            {!! Form::submit(trans("ManageAccount.save_payment_details_submit"), ['class' => 'btn btn-success pull-right']) !!}
        </div>
    </div>
</div>

{!! Form::close() !!}

