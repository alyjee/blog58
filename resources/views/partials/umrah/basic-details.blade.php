<div class="row">
	<div class="col-sm-6">
		<div class="form-group form-group {{ $errors->has('date') ? ' has-error' : '' }}">
    		{!! Form::label('date', 'Date') !!}
    		{!! Form::text('', $form_creation_date,['placeholder'=>'Date', 'class'=>'form-control', 'readonly'=>'readonly']) !!}
    		@if ($errors->has('date'))
                <div class="form-control-feedback">{{ $errors->first('date') }}</div>
            @endif
		</div>
	</div>

	<div class="col-sm-6">
		<div class="form-group {{ $errors->has('ref_num') ? ' has-error' : '' }}">
    		{!! Form::label('ref_num', 'Ref# SL/') !!}
    		{!! Form::text('ref_num', $form_ref_number,['placeholder'=>'Reference Number', 'class'=>'form-control', 'readonly'=>'readonly']) !!}
    		@if ($errors->has('ref_num'))
                <div class="form-control-feedback">{{ $errors->first('ref_num') }}</div>
            @endif
		</div>`
	</div>
</div>

<div class="row">
	<div class="col-sm-12">
		<div class="form-group form-group {{ $errors->has('person_name') ? ' has-error' : '' }}">
    		{!! Form::label('person_name', 'DEAR Mr./Mrs./Ms.') !!}
    		{!! Form::text('person_name', null,['placeholder'=>'Enter Name Here', 'class'=>'form-control']) !!}
    		@if ($errors->has('person_name'))
                <div class="form-control-feedback">{{ $errors->first('person_name') }}</div>
            @endif
		</div>

		<div class="form-group form-group">
    		<p>Great thanks for taking interest to travel with SEA LINKS TRAVEL & TOURS. Your required rates of Umrah and Tickets are mentioned below, after viewing these rates please don't hesitate to contact this office for any inquiry or further clarification.</p>
    		<p>Details as below:</p>
		</div>
	</div>
</div>

<div class="row">

	<div class="col-sm-3">
		<div class="form-group {{ $errors->has('from_date') ? ' has-error' : '' }}">
    		{!! Form::label('from_date', 'From') !!}
    		{!! Form::text('from_date', null,['placeholder'=>'From Date', 'class'=>'form-control mydatepicker']) !!}
    		@if ($errors->has('from_date'))
                <div class="form-control-feedback">{{ $errors->first('from_date') }}</div>
            @endif
		</div>
	</div>

	<div class="col-sm-3">
		<div class="form-group {{ $errors->has('to_date') ? ' has-error' : '' }}">
    		{!! Form::label('to_date', 'To') !!}
    		{!! Form::text('to_date', null,['placeholder'=>'To Date', 'class'=>'form-control mydatepicker']) !!}
    		@if ($errors->has('to_date'))
                <div class="form-control-feedback">{{ $errors->first('to_date') }}</div>
            @endif
		</div>
	</div>

    <div class="col-sm-6">
        <div class="form-group form-group {{ $errors->has('total_days') ? ' has-error' : '' }}">
            {!! Form::label('total_days', 'No. of Nights/Days') !!}
            {!! Form::number('total_days', null,['placeholder'=>'Enter total days here', 'class'=>'form-control', 'readonly'=>'readonly']) !!}
            @if ($errors->has('total_days'))
                <div class="form-control-feedback">{{ $errors->first('total_days') }}</div>
            @endif
        </div>
    </div>

</div>

<div class="row">
	<div class="col-sm-6">
		<div class="form-group form-group {{ $errors->has('total_passengers') ? ' has-error' : '' }}">
    		{!! Form::label('total_passengers', 'Total Passengers') !!}
    		{!! Form::number('total_passengers', null,['placeholder'=>'Enter total passengers here e.g. 3', 'class'=>'form-control readonly pricing-input']) !!}
    		@if ($errors->has('total_passengers'))
                <div class="form-control-feedback">{{ $errors->first('total_passengers') }}</div>
            @endif
		</div>
	</div>

	<div class="col-sm-2">
		<div class="form-group {{ $errors->has('adults') ? ' has-error' : '' }}">
    		{!! Form::label('adults', 'Adult/s') !!}
    		{!! Form::number('adults', null,['placeholder'=>'Adults e.g. 2', 'class'=>'form-control pricing-input']) !!}
    		@if ($errors->has('adults'))
                <div class="form-control-feedback">{{ $errors->first('adults') }}</div>
            @endif
		</div>
	</div>

	<div class="col-sm-2">
		<div class="form-group {{ $errors->has('childs') ? ' has-error' : '' }}">
    		{!! Form::label('childs', 'Child/s') !!}
    		{!! Form::number('childs', null,['placeholder'=>'Children e.g. 1', 'class'=>'form-control pricing-input']) !!}
    		@if ($errors->has('childs'))
                <div class="form-control-feedback">{{ $errors->first('childs') }}</div>
            @endif
		</div>
	</div>

	<div class="col-sm-2">
		<div class="form-group {{ $errors->has('infants') ? ' has-error' : '' }}">
    		{!! Form::label('infants', 'Infant/s') !!}
    		{!! Form::number('infants', null,['placeholder'=>'Infants e.g. 0', 'class'=>'form-control pricing-input']) !!}
    		@if ($errors->has('infants'))
                <div class="form-control-feedback">{{ $errors->first('infants') }}</div>
            @endif
		</div>
	</div>
</div>

<div class="row">
	<div class="col-sm-6">
		<div class="form-group form-group {{ $errors->has('package_category') ? ' has-error' : '' }}">
    		{!! Form::label('package_category', 'Package Category') !!}
    		{!! Form::select('package_category', $packageSelect, null, ['placeholder'=>'Select Package Category', 'class'=>'form-control pricing-input']) !!}
    		@if ($errors->has('package_category'))
                <div class="form-control-feedback">{{ $errors->first('package_category') }}</div>
            @endif
		</div>
	</div>

    {!! Form::hidden('psf', null,['placeholder'=>'Infants e.g. 0', 'class'=>'form-control']) !!}

	<div class="col-sm-3">
		<div class="form-group {{ $errors->has('transport') ? ' has-error' : '' }}">
    		{!! Form::label('transport', 'Transport Type') !!}
    		{!! Form::select('transport', $transportTypeSelect, null, ['placeholder'=>'Select Transport Type', 'class'=>'form-control pricing-input']) !!}
    		@if ($errors->has('transport'))
                <div class="form-control-feedback">{{ $errors->first('transport') }}</div>
            @endif
		</div>
	</div>

</div>

<div class="row">
	<div class="col-sm-6">
		<div class="form-group form-group {{ $errors->has('airline') ? ' has-error' : '' }}">
    		{!! Form::label('airline', 'Airline') !!}
    		{!! Form::text('airline', null,['placeholder'=>'Select Airline', 'class'=>'form-control readonly']) !!}
    		@if ($errors->has('airline'))
                <div class="form-control-feedback">{{ $errors->first('airline') }}</div>
            @endif
		</div>
	</div>

	<div class="col-sm-6">
		<div class="form-group {{ $errors->has('flight_type') ? ' has-error' : '' }}">
    		{!! Form::label('flight_type', 'Flight Type') !!}
            {!! Form::select('flight_type', $flightTypeSelect, null, ['placeholder'=>'Select Flight Type', 'class'=>'form-control']) !!}
    		@if ($errors->has('flight_type'))
                <div class="form-control-feedback">{{ $errors->first('flight_type') }}</div>
            @endif
		</div>
	</div>
</div>

<div class="row">
    <div class="col-sm-12 text-right" style="margin-bottom: 15px;">
        <button type="button" class="btn btn-primary add-new-flight-detail">Flight +</button>
    </div>
</div>

@if(!isset($proposedForm) || $proposedForm->flight_details()->count() == 0)
    @include('partials/umrah/flight-details')
@else
    @foreach($proposedForm->flight_details()->get() as $flight_detail)
        @include('partials/umrah/flight-details', $flight_detail->toArray())
    @endforeach
@endif

<hr />