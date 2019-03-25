<div class="row">
	<div class="col-sm-12 text-center">
		<h3>PERSONAL DETAILS</h3>
	</div>
</div>

<div class="row">
	<div class="col-sm-2">
		<div class="form-group {{ $errors->has('sur_name') ? ' has-error' : '' }}">
    		{!! Form::label('sur_name', 'Surname') !!}
    		{!! Form::text('sur_name', null,['placeholder'=>'Mr./Mrs./Ms.', 'class'=>'form-control']) !!}
    		@if ($errors->has('sur_name'))
                <div class="form-control-feedback">{{ $errors->first('sur_name') }}</div>
            @endif
		</div>
	</div>

	<div class="col-sm-5">
		<div class="form-group {{ $errors->has('given_name') ? ' has-error' : '' }}">
    		{!! Form::label('given_name', 'Given Name') !!}
    		{!! Form::text('given_name', null,['placeholder'=>'Enter Given Name here', 'class'=>'form-control']) !!}
    		@if ($errors->has('given_name'))
                <div class="form-control-feedback">{{ $errors->first('given_name') }}</div>
            @endif
		</div>
	</div>

	<div class="col-sm-5">
		<div class="form-group {{ $errors->has('middle_name') ? ' has-error' : '' }}">
    		{!! Form::label('middle_name', 'Middle Name') !!}
    		{!! Form::text('middle_name', null,['placeholder'=>'Enter Middle Name', 'class'=>'form-control']) !!}
    		@if ($errors->has('middle_name'))
                <div class="form-control-feedback">{{ $errors->first('middle_name') }}</div>
            @endif
		</div>
	</div>
</div>

<div class="row">
	<div class="col-sm-6">
		<div class="form-group {{ $errors->has('dob') ? ' has-error' : '' }}">
    		{!! Form::label('dob', 'Date of Birth:') !!}
    		{!! Form::text('dob', null,['placeholder'=>'Date', 'class'=>'form-control']) !!}
    		@if ($errors->has('dob'))
                <div class="form-control-feedback">{{ $errors->first('dob') }}</div>
            @endif
		</div>
	</div>
</div>

<div class="row">
	<div class="col-sm-6">
		<div class="form-group {{ $errors->has('passport_num') ? ' has-error' : '' }}">
    		{!! Form::label('passport_num', 'Passport') !!}
    		{!! Form::text('passport_num', null,['placeholder'=>'99999-9999999-9.', 'class'=>'form-control']) !!}
    		@if ($errors->has('passport_num'))
                <div class="form-control-feedback">{{ $errors->first('passport_num') }}</div>
            @endif
		</div>
	</div>

	<div class="col-sm-3">
		<div class="form-group {{ $errors->has('passport_issue_date') ? ' has-error' : '' }}">
    		{!! Form::label('passport_issue_date', 'Passport Issue Date') !!}
    		{!! Form::text('passport_issue_date', null,['placeholder'=>'Date', 'class'=>'form-control']) !!}
    		@if ($errors->has('passport_issue_date'))
                <div class="form-control-feedback">{{ $errors->first('passport_issue_date') }}</div>
            @endif
		</div>
	</div>

	<div class="col-sm-3">
		<div class="form-group {{ $errors->has('passport_expiry_date') ? ' has-error' : '' }}">
    		{!! Form::label('passport_expiry_date', 'Passport') !!}
    		{!! Form::text('passport_expiry_date', null,['placeholder'=>'Date.', 'class'=>'form-control']) !!}
    		@if ($errors->has('passport_expiry_date'))
                <div class="form-control-feedback">{{ $errors->first('passport_expiry_date') }}</div>
            @endif
		</div>
	</div>
</div>

<hr />