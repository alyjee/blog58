@extends('eadmin.layouts.material')

@section('content')
<div class="row">
    <div class="col-lg-12">
    	<div class="white-box">
	        <h3 class="box-title m-b-0">Add New Hotel</h3>
	        <p class="text-muted m-b-30 font-13"></p>
	        <div class="row">
	            <div class="col-sm-12 col-xs-12">
	            	@if(\Request::route()->getName() == 'dashboard.hotels.edit')
	            		{!! Form::model($hotel, ['route' => ['dashboard.hotels.update', 'id'=>$hotel->id], 'method' => 'post', 'files'=>false]) !!}
	            	@else
	            		{!! Form::open(['route' => 'dashboard.hotels.store', 'method' => 'post', 'files'=>false]) !!}
	            	@endif

	            		<div class="form-group form-group {{ $errors->has('category') ? ' has-error' : '' }}">
		            		{!! Form::label('category', 'Category') !!}
		            		{!! Form::select('category', $categories, null, ['placeholder'=>'Select Hotel Category', 'class'=>'form-control']) !!}
		            		@if ($errors->has('category'))
	                            <div class="form-control-feedback">{{ $errors->first('category') }}</div>
	                        @endif
	            		</div>

	            		<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
		            		{!! Form::label('name', 'Name') !!}
		            		{!! Form::text('name', null,['placeholder'=>'Enter Category Name', 'class'=>'form-control']) !!}
		            		@if ($errors->has('name'))
	                            <div class="form-control-feedback">{{ $errors->first('name') }}</div>
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