<div class="row">
    <div class="col-sm-12 text-center">
        <h3>PAYMENT DETAILS</h3>
    </div>
    <div class="col-sm-12 text-right">
        <button type="button" class="btn btn-primary waves-effect waves-light m-r-10 add-new-payment">Add New Payment</button>
    </div>
</div>

@if($paymentlDetails->count() <= 0 )
<div class="row payment-detail-row">
	<div class="col-sm-3">
		<div class="form-group {{ $errors->has('pending_amount') ? ' has-error' : '' }}">
    		{!! Form::label('pending_amount', 'Pending Amount (PKR)') !!}
    		{!! Form::number('pending_amount[]', $proposedForm->total_package_price_pkr,['placeholder'=>'Enter Amount', 'class'=>'form-control pending_amount_input', 'step'=>'.01', 'readonly'=>'readonly']) !!}
    		@if ($errors->has('pending_amount'))
                <div class="form-control-feedback">{{ $errors->first('pending_amount') }}</div>
            @endif
		</div>
	</div>

	<div class="col-sm-3">
		<div class="form-group {{ $errors->has('received_amount') ? ' has-error' : '' }}">
    		{!! Form::label('received_amount', 'Received Amount (PKR)') !!}
    		{!! Form::number('received_amount[]', null,['placeholder'=>'Enter Amount', 'class'=>'form-control received_amount_input payment-input', 'step'=>'.01']) !!}
    		@if ($errors->has('received_amount'))
                <div class="form-control-feedback">{{ $errors->first('received_amount') }}</div>
            @endif
		</div>
	</div>

    <div class="col-sm-3">
        <div class="form-group {{ $errors->has('remaining_amount') ? ' has-error' : '' }}">
            {!! Form::label('remaining_amount', 'Remaining Amount (PKR)') !!}
            {!! Form::number('remaining_amount[]', null,['placeholder'=>'Enter Amount', 'class'=>'form-control remaining_amount_input payment-input', 'step'=>'.01', 'readonly'=>'readonly']) !!}
            @if ($errors->has('remaining_amount'))
                <div class="form-control-feedback">{{ $errors->first('remaining_amount') }}</div>
            @endif
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group {{ $errors->has('receiving_date') ? ' has-error' : '' }}">
            {!! Form::label('receiving_date', 'Receiving Date') !!}
            {!! Form::text('receiving_date[]', null,['placeholder'=>'Select Date of Receiving', 'class'=>'form-control payment-input mydatepicker', 'step'=>'.01']) !!}
            @if ($errors->has('receiving_date'))
                <div class="form-control-feedback">{{ $errors->first('receiving_date') }}</div>
            @endif
        </div>
    </div>
</div>
@endif

@if($paymentlDetails->count() > 0 )
    <?php $sub = 0; ?>
    @foreach($paymentlDetails as $pytd)
        <div class="row payment-detail-row">
            <div class="col-sm-3">
                <div class="form-group {{ $errors->has('pending_amount') ? ' has-error' : '' }}">
                    {!! Form::label('pending_amount', 'Pending Amount (PKR)') !!}
                    {!! Form::number('pending_amount[]', $proposedForm->total_package_price_pkr - $sub,['placeholder'=>'Enter Amount', 'class'=>'form-control pending_amount_input', 'step'=>'.01', 'readonly'=>'readonly']) !!}
                    @if ($errors->has('pending_amount'))
                        <div class="form-control-feedback">{{ $errors->first('pending_amount') }}</div>
                    @endif
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group {{ $errors->has('received_amount') ? ' has-error' : '' }}">
                    {!! Form::label('received_amount', 'Received Amount (PKR)') !!}
                    {!! Form::number('received_amount[]', $pytd->received_amount,['placeholder'=>'Enter Amount', 'class'=>'form-control received_amount_input payment-input', 'step'=>'.01']) !!}
                    @if ($errors->has('received_amount'))
                        <div class="form-control-feedback">{{ $errors->first('received_amount') }}</div>
                    @endif
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group {{ $errors->has('remaining_amount') ? ' has-error' : '' }}">
                    {!! Form::label('remaining_amount', 'Remaining Amount (PKR)') !!}
                    {!! Form::number('remaining_amount[]', $proposedForm->total_package_price_pkr - $pytd->received_amount - $sub,['placeholder'=>'Enter Amount', 'class'=>'form-control remaining_amount_input payment-input', 'step'=>'.01', 'readonly'=>'readonly']) !!}
                    @if ($errors->has('remaining_amount'))$
                        <div class="form-control-feedback">{{ $errors->first('remaining_amount') }}</div>
                    @endif
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group {{ $errors->has('receiving_date') ? ' has-error' : '' }}">
                    {!! Form::label('receiving_date', 'Receiving Date') !!}
                    {!! Form::text('receiving_date[]', $pytd->receiving_date,['placeholder'=>'Select Date of Receiving', 'class'=>'form-control payment-input mydatepicker', 'step'=>'.01']) !!}
                    @if ($errors->has('receiving_date'))
                        <div class="form-control-feedback">{{ $errors->first('receiving_date') }}</div>
                    @endif
                </div>
            </div>
        </div>
        <?php $sub += $pytd->received_amount; ?>
    @endforeach
@endif