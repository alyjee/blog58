@extends('eadmin.layouts.material')

@section('content')
<div class="row">
    <div class="col-lg-12">
    	<div class="white-box">
	        <h3 class="box-title m-b-0">Add New Room</h3>
	        <p class="text-muted m-b-30 font-13"></p>
	        <div class="row">
	            <div class="col-sm-12 col-xs-12">
	            	@if(\Request::route()->getName() == 'dashboard.hotels.edit')
	            		{!! Form::model($hotel, ['route' => ['dashboard.hotels.update', 'id'=>$hotel->id], 'method' => 'post', 'files'=>false]) !!}
	            	@else
	            		{!! Form::open(['route' => 'dashboard.hotels.store', 'method' => 'post', 'files'=>false]) !!}
	            	@endif

	            		<div class="form-group form-group {{ $errors->has('hotel_id') ? ' has-error' : '' }}">
		            		{!! Form::label('hotel_id', 'Hotel') !!}
		            		{!! Form::select('hotel_id', $hotelsSelect, null, ['placeholder'=>'Select Hotel', 'class'=>'form-control']) !!}
		            		@if ($errors->has('hotel_id'))
	                            <div class="form-control-feedback">{{ $errors->first('hotel_id') }}</div>
	                        @endif
	            		</div>

	            		<div class="form-group form-group {{ $errors->has('capacity') ? ' has-error' : '' }}">
		            		{!! Form::label('capacity', 'Capacity') !!}
		            		{!! Form::select('capacity', $capacitiesSelect, null, ['placeholder'=>'Select Beds Capacity', 'class'=>'form-control']) !!}
		            		@if ($errors->has('capacity'))
	                            <div class="form-control-feedback">{{ $errors->first('capacity') }}</div>
	                        @endif
	            		</div>

	            		<div class="form-group form-group {{ $errors->has('description') ? ' has-error' : '' }}">
		            		{!! Form::label('description', 'Description') !!}
		            		{!! Form::select('description', $hotelsSelect, null, ['placeholder'=>'Select Room Description', 'class'=>'form-control']) !!}
		            		@if ($errors->has('description'))
	                            <div class="form-control-feedback">{{ $errors->first('description') }}</div>
	                        @endif
	            		</div>

	            		<div class="form-group form-group {{ $errors->has('view') ? ' has-error' : '' }}">
		            		{!! Form::label('view', 'View') !!}
		            		{!! Form::select('view', $hotelsSelect, null, ['placeholder'=>'Select Room View', 'class'=>'form-control']) !!}
		            		@if ($errors->has('view'))
	                            <div class="form-control-feedback">{{ $errors->first('view') }}</div>
	                        @endif
	            		</div>

	            		<div class="form-group {{ $errors->has('weekday_price') ? ' has-error' : '' }}">
		            		{!! Form::label('weekday_price', 'Price in Weekdays') !!}
		            		{!! Form::text('weekday_price', null,['placeholder'=>'Enter Price during Weekdays', 'class'=>'form-control']) !!}
		            		@if ($errors->has('weekday_price'))
	                            <div class="form-control-feedback">{{ $errors->first('weekday_price') }}</div>
	                        @endif
	            		</div>

	            		<div class="form-group {{ $errors->has('weekend_price') ? ' has-error' : '' }}">
		            		{!! Form::label('weekend_price', 'Price in Weekends (Fri - Sat)') !!}
		            		{!! Form::text('weekend_price', null,['placeholder'=>'Enter Price during Weekends', 'class'=>'form-control']) !!}
		            		@if ($errors->has('weekend_price'))
	                            <div class="form-control-feedback">{{ $errors->first('weekend_price') }}</div>
	                        @endif
	            		</div>

	            		<button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>

	            	{!! Form::close() !!}
	            </div>
	        </div>
	    </div>
    </div>
</div>
@stop