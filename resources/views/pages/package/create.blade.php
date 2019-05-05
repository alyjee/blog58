@extends('eadmin.layouts.material')

@section('content')
<div class="row">
    <div class="col-lg-12">
    	<div class="white-box">
	        <h3 class="box-title m-b-0">Add/Edit Package</h3>
	        <p class="text-muted m-b-30 font-13"></p>
	        <div class="row">
	            <div class="col-sm-12 col-xs-12">
	            	@if(\Request::route()->getName() == 'dashboard.packages.edit')
	            		{!! Form::model($package, ['route' => ['dashboard.packages.update', 'id'=>$package->id], 'method' => 'post', 'files'=>false]) !!}
	            	@else
	            		{!! Form::open(['route' => 'dashboard.packages.store', 'method' => 'post', 'files'=>false]) !!}
	            	@endif
	            		<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
		            		{!! Form::label('name', 'Name') !!}
		            		{!! Form::text('name', null,['placeholder'=>'Enter Category Name here', 'class'=>'form-control']) !!}
		            		@if ($errors->has('name'))
	                            <div class="form-control-feedback">{{ $errors->first('name') }}</div>
	                        @endif
	            		</div>

	            		<div class="form-group {{ $errors->has('price') ? ' has-error' : '' }}">
		            		{!! Form::label('price', 'PSF (SAR)') !!}
		            		{!! Form::text('price', null,['placeholder'=>'Enter PSF Price (SAR)', 'class'=>'form-control']) !!}
		            		@if ($errors->has('price'))
	                            <div class="form-control-feedback">{{ $errors->first('price') }}</div>
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