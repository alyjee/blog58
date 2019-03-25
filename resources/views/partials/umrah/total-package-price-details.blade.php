<div class="row">
	<div class="col-sm-6">
		<div class="form-group {{ $errors->has('umrah_per_person') ? ' has-error' : '' }}">
    		{!! Form::label('umrah_per_person', 'Umrah/Person (PKR)') !!}
    		{!! Form::number('umrah_per_person', null,['placeholder'=>'Enter Price', 'class'=>'form-control', 'step'=>'.01']) !!}
    		@if ($errors->has('umrah_per_person'))
                <div class="form-control-feedback">{{ $errors->first('umrah_per_person') }}</div>
            @endif
		</div>
	</div>

	<div class="col-sm-6">
		<div class="form-group {{ $errors->has('adult_ticket_price') ? ' has-error' : '' }}">
    		{!! Form::label('adult_ticket_price', 'Adult/s Ticket Price (PKR)') !!}
    		{!! Form::number('adult_ticket_price', null,['placeholder'=>'Enter Price', 'class'=>'form-control', 'step'=>'.01']) !!}
    		@if ($errors->has('adult_ticket_price'))
                <div class="form-control-feedback">{{ $errors->first('adult_ticket_price') }}</div>
            @endif
		</div>

		<div class="form-group {{ $errors->has('child_ticket_price') ? ' has-error' : '' }}">
    		{!! Form::label('child_ticket_price', 'Child/s Ticket Price (PKR)') !!}
    		{!! Form::number('child_ticket_price', null,['placeholder'=>'Enter Price', 'class'=>'form-control', 'step'=>'.01']) !!}
    		@if ($errors->has('child_ticket_price'))
                <div class="form-control-feedback">{{ $errors->first('child_ticket_price') }}</div>
            @endif
		</div>

		<div class="form-group {{ $errors->has('infant_ticket_price') ? ' has-error' : '' }}">
    		{!! Form::label('infant_ticket_price', 'Infant/s Ticket Price (PKR)') !!}
    		{!! Form::number('infant_ticket_price', null,['placeholder'=>'Enter Price', 'class'=>'form-control', 'step'=>'.01']) !!}
    		@if ($errors->has('infant_ticket_price'))
                <div class="form-control-feedback">{{ $errors->first('infant_ticket_price') }}</div>
            @endif
		</div>
	</div>
</div>

<div class="row">
	<div class="col-sm-6">
		<div class="form-group {{ $errors->has('total_umrah_price') ? ' has-error' : '' }}">
    		{!! Form::label('total_umrah_price', 'Total Umrah Package (PKR)') !!}
    		{!! Form::number('total_umrah_price', null,['placeholder'=>'Enter Price', 'class'=>'form-control', 'step'=>'.01']) !!}
    		@if ($errors->has('total_umrah_price'))
                <div class="form-control-feedback">{{ $errors->first('total_umrah_price') }}</div>
            @endif
		</div>
	</div>

	<div class="col-sm-6">
		<div class="form-group {{ $errors->has('total_ticket_price') ? ' has-error' : '' }}">
    		{!! Form::label('total_ticket_price', 'Total Ticket/s Price (PKR)') !!}
    		{!! Form::number('total_ticket_price', null,['placeholder'=>'Enter Price', 'class'=>'form-control', 'step'=>'.01']) !!}
    		@if ($errors->has('total_ticket_price'))
                <div class="form-control-feedback">{{ $errors->first('total_ticket_price') }}</div>
            @endif
		</div>
	</div>
</div>

<div class="row">
	<div class="col-sm-6">
		<div class="form-group {{ $errors->has('total_package_price') ? ' has-error' : '' }}">
    		{!! Form::label('total_package_price', 'Total Package Price (PKR)') !!}
    		{!! Form::number('total_package_price', null,['placeholder'=>'Enter Price', 'class'=>'form-control', 'step'=>'.01']) !!}
    		@if ($errors->has('total_package_price'))
                <div class="form-control-feedback">{{ $errors->first('total_package_price') }}</div>
            @endif
		</div>
	</div>

	<div class="col-sm-6">
		
	</div>
</div>

<hr />