@extends('eadmin.layouts.material')

@section('content')
<div class="row">
    <div class="col-lg-12">
    	<div class="white-box">
	        <h3 class="box-title m-b-0">Add/Edit Hotel</h3>
	        <p class="text-muted m-b-30 font-13"></p>
	        <div class="row">
	            <div class="col-sm-12 col-xs-12">
	            	@if(\Request::route()->getName() == 'dashboard.hotels.edit')
	            		{!! Form::model($hotel, ['route' => ['dashboard.hotels.update', 'id'=>$hotel->id], 'method' => 'post', 'files'=>false]) !!}
	            	@else
	            		{!! Form::open(['route' => 'dashboard.hotels.store', 'method' => 'post', 'files'=>false]) !!}
	            	@endif
	            		<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
		            		{!! Form::label('name', 'Name') !!}
		            		{!! Form::text('name', null,['placeholder'=>'Enter Hotel Name here', 'class'=>'form-control']) !!}
		            		@if ($errors->has('name'))
	                            <div class="form-control-feedback">{{ $errors->first('name') }}</div>
	                        @endif
	            		</div>

	            		<div class="form-group {{ $errors->has('category') ? ' has-error' : '' }}">
		            		{!! Form::label('category', 'Category') !!}
		            		{!! Form::select('category', $categories, null, ['placeholder'=>'Select Hotel Categort', 'class'=>'form-control']) !!}
		            		@if ($errors->has('category'))
	                            <div class="form-control-feedback">{{ $errors->first('category') }}</div>
	                        @endif
	            		</div>

	            		<div class="form-group {{ $errors->has('double') ? ' has-error' : '' }}">
		            		{!! Form::label('double', 'Double') !!}
		            		{!! Form::text('double', null,['placeholder'=>'Enter Double Price', 'class'=>'form-control']) !!}
		            		@if ($errors->has('double'))
	                            <div class="form-control-feedback">{{ $errors->first('double') }}</div>
	                        @endif
	            		</div>

	            		<div class="form-group {{ $errors->has('triple') ? ' has-error' : '' }}">
		            		{!! Form::label('triple', 'Triple') !!}
		            		{!! Form::text('triple', null,['placeholder'=>'Enter Triple Price', 'class'=>'form-control']) !!}
		            		@if ($errors->has('triple'))
	                            <div class="form-control-feedback">{{ $errors->first('triple') }}</div>
	                        @endif
	            		</div>

	            		<div class="form-group {{ $errors->has('quad') ? ' has-error' : '' }}">
		            		{!! Form::label('quad', 'Quad') !!}
		            		{!! Form::text('quad', null,['placeholder'=>'Enter Quad Price', 'class'=>'form-control']) !!}
		            		@if ($errors->has('quad'))
	                            <div class="form-control-feedback">{{ $errors->first('quad') }}</div>
	                        @endif
	            		</div>

	            		<div class="form-group {{ $errors->has('quint') ? ' has-error' : '' }}">
		            		{!! Form::label('quint', 'Quint') !!}
		            		{!! Form::text('quint', null,['placeholder'=>'Enter Quint Price', 'class'=>'form-control']) !!}
		            		@if ($errors->has('quint'))
	                            <div class="form-control-feedback">{{ $errors->first('quint') }}</div>
	                        @endif
	            		</div>

	            		<div class="form-group {{ $errors->has('distance_from_haram') ? ' has-error' : '' }}">
		            		{!! Form::label('distance_from_haram', 'Haram Distance (miles)') !!}
		            		{!! Form::number('distance_from_haram', null,['placeholder'=>'Enter Distance from Haram in miles', 'class'=>'form-control']) !!}
		            		@if ($errors->has('distance_from_haram'))
	                            <div class="form-control-feedback">{{ $errors->first('distance_from_haram') }}</div>
	                        @endif
	            		</div>

	            		<div class="form-group {{ $errors->has('room_basis') ? ' has-error' : '' }}">
		            		{!! Form::label('room_basis', 'Room Basis') !!}
		            		{!! Form::text('room_basis', null,['placeholder'=>'Enter Room Basis e.g. BB, Room only Basis', 'class'=>'form-control']) !!}
		            		@if ($errors->has('room_basis'))
	                            <div class="form-control-feedback">{{ $errors->first('room_basis') }}</div>
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