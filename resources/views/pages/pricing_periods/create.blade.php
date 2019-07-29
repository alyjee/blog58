@extends('eadmin.layouts.material')

@section('content')
<div class="row">
    <div class="col-lg-12">
    	<div class="white-box">
	        <h1 class="box-title m-b-0">For hotel : {{$hotel->name}}</h1>
	        <h3 class="box-title m-b-0">Add/Edit Pricing Period</h3>
	        <p class="text-muted m-b-30 font-13"></p>
	        <div class="row">
	            <div class="col-sm-12 col-xs-12">
	            	@if(\Request::route()->getName() == 'dashboard.hotels.pricing_period.edit')
	            		{!! Form::model($pp, ['route' => ['dashboard.hotels.pricing_period.update', 'hid'=>$hotel->id, 'id'=>$pp->id], 'method' => 'post', 'files'=>false]) !!}
	            	@else
	            		{!! Form::open(['route' => ['dashboard.hotels.pricing_period.store','hid'=>$hotel->id], 'method' => 'post', 'files'=>false]) !!}
	            	@endif
	            	<div class="row">
	            		<div class="form-group col-sm-3 {{ $errors->has('from_date') ? ' has-error' : '' }}">
		            		{!! Form::label('from_date', 'From Date') !!}
		            		{!! Form::text('from_date', null,['placeholder'=>'Enter From Date', 'class'=>'form-control mydatepicker']) !!}
		            		@if ($errors->has('from_date'))
	                            <div class="form-control-feedback">{{ $errors->first('from_date') }}</div>
	                        @endif
	            		</div>

	            		<div class="form-group col-sm-3 {{ $errors->has('to_date') ? ' has-error' : '' }}">
		            		{!! Form::label('to_date', 'To Date') !!}
		            		{!! Form::text('to_date', null,['placeholder'=>'Enter To Date', 'class'=>'form-control mydatepicker']) !!}
		            		@if ($errors->has('to_date'))
	                            <div class="form-control-feedback">{{ $errors->first('to_date') }}</div>
	                        @endif
	            		</div>
            		</div>

            		<div class="row">
	            		<div class="form-group col-sm-12 text-right">
	            			<button type="button" class="btn btn-primary add-new-feature">Feature +</button>
	            		</div>
            		</div>

            		@foreach($pp->pricing_features()->get() as $pf)
            			<div class="row feature-row">
		            		<div class="form-group col-sm-5 {{ $errors->has('feature[name][]') ? ' has-error' : '' }}">
			            		{!! Form::label('feature[name][]', 'Feature Name') !!}
			            		{!! Form::text('feature[name][]', $pf->name,['placeholder'=>'Enter Feature Name', 'class'=>'form-control']) !!}
			            		@if ($errors->has('feature[name][]'))
		                            <div class="form-control-feedback">{{ $errors->first('feature[name][]') }}</div>
		                        @endif
		            		</div>

		            		<div class="form-group col-sm-3 {{ $errors->has('feature[price][]') ? ' has-error' : '' }}">
			            		{!! Form::label('feature[price][]', 'Feature Price - Weekdays') !!}
			            		{!! Form::text('feature[price][]', $pf->price,['placeholder'=>'Feature Weekdays Price', 'class'=>'form-control']) !!}
			            		@if ($errors->has('feature[price][]'))
		                            <div class="form-control-feedback">{{ $errors->first('feature[price][]') }}</div>
		                        @endif
		            		</div>

		            		<div class="form-group col-sm-3 {{ $errors->has('feature[weekend_price][]') ? ' has-error' : '' }}">
			            		{!! Form::label('feature[weekend_price][]', 'Feature Price - Weekends') !!}
			            		{!! Form::text('feature[weekend_price][]', $pf->weekend_price,['placeholder'=>'Feature Weekends Price', 'class'=>'form-control']) !!}
			            		@if ($errors->has('feature[weekend_price][]'))
		                            <div class="form-control-feedback">{{ $errors->first('feature[weekend_price][]') }}</div>
		                        @endif
		            		</div>

		            		<div class="form-group col-sm-1">
					            <label for="Remove">Remove</label>
					            <button type="button" class="btn btn-danger remove-feature">X</button>
					        </div>
	            		</div>
            		@endforeach

            		<div class="row feature-row">
	            		<div class="form-group col-sm-5 {{ $errors->has('feature[name][]') ? ' has-error' : '' }}">
		            		{!! Form::label('feature[name][]', 'Feature Name') !!}
		            		{!! Form::text('feature[name][]', null,['placeholder'=>'Enter Feature Name', 'class'=>'form-control']) !!}
		            		@if ($errors->has('feature[name][]'))
	                            <div class="form-control-feedback">{{ $errors->first('feature[name][]') }}</div>
	                        @endif
	            		</div>

	            		<div class="form-group col-sm-3 {{ $errors->has('feature[price][]') ? ' has-error' : '' }}">
		            		{!! Form::label('feature[price][]', 'Feature Price - Weekdays') !!}
		            		{!! Form::text('feature[price][]', null,['placeholder'=>'Feature Weekdays Price', 'class'=>'form-control']) !!}
		            		@if ($errors->has('feature[price][]'))
	                            <div class="form-control-feedback">{{ $errors->first('feature[price][]') }}</div>
	                        @endif
	            		</div>

	            		<div class="form-group col-sm-3 {{ $errors->has('feature[weekend_price][]') ? ' has-error' : '' }}">
		            		{!! Form::label('feature[weekend_price][]', 'Feature Price - Weekends') !!}
		            		{!! Form::text('feature[weekend_price][]', null,['placeholder'=>'Feature Weekends Price', 'class'=>'form-control']) !!}
		            		@if ($errors->has('feature[weekend_price][]'))
	                            <div class="form-control-feedback">{{ $errors->first('feature[weekend_price][]') }}</div>
	                        @endif
	            		</div>

	            		<div class="form-group col-sm-1">
				            <label for="Remove">Remove</label>
				            <button type="button" class="btn btn-danger remove-feature">X</button>
				        </div>
            		</div>
	            		

            		<button type="button" class="btn btn-success waves-effect waves-light m-r-10 submit-form">Submit</button>

	            	{!! Form::close() !!}

            		
        			</a>
	            </div>
	        </div>
	    </div>
    </div>
</div>
@stop