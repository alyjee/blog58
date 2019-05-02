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
	            		<div class="form-group col-sm-3 {{ $errors->has('double') ? ' has-error' : '' }}">
		            		{!! Form::label('double', 'Double') !!}
		            		{!! Form::text('double', null,['placeholder'=>'Enter Double Price', 'class'=>'form-control']) !!}
		            		@if ($errors->has('double'))
	                            <div class="form-control-feedback">{{ $errors->first('double') }}</div>
	                        @endif
	            		</div>

	            		<div class="form-group col-sm-3 {{ $errors->has('triple') ? ' has-error' : '' }}">
		            		{!! Form::label('triple', 'Triple') !!}
		            		{!! Form::text('triple', null,['placeholder'=>'Enter Triple Price', 'class'=>'form-control']) !!}
		            		@if ($errors->has('triple'))
	                            <div class="form-control-feedback">{{ $errors->first('triple') }}</div>
	                        @endif
	            		</div>

	            		<div class="form-group col-sm-3 {{ $errors->has('quad') ? ' has-error' : '' }}">
		            		{!! Form::label('quad', 'Quad') !!}
		            		{!! Form::text('quad', null,['placeholder'=>'Enter Quad Price', 'class'=>'form-control']) !!}
		            		@if ($errors->has('quad'))
	                            <div class="form-control-feedback">{{ $errors->first('quad') }}</div>
	                        @endif
	            		</div>

	            		<div class="form-group col-sm-3 {{ $errors->has('quint') ? ' has-error' : '' }}">
		            		{!! Form::label('quint', 'Quint') !!}
		            		{!! Form::text('quint', null,['placeholder'=>'Enter Quint Price', 'class'=>'form-control']) !!}
		            		@if ($errors->has('quint'))
	                            <div class="form-control-feedback">{{ $errors->first('quint') }}</div>
	                        @endif
	            		</div>

	            		<div class="form-group col-sm-3 {{ $errors->has('sharing') ? ' has-error' : '' }}">
		            		{!! Form::label('sharing', 'Sharing') !!}
		            		{!! Form::text('sharing', null,['placeholder'=>'Enter Sharing Price', 'class'=>'form-control']) !!}
		            		@if ($errors->has('sharing'))
	                            <div class="form-control-feedback">{{ $errors->first('sharing') }}</div>
	                        @endif
	            		</div>

            		</div>

            		<div class="row">
	            		<div class="form-group col-sm-3 {{ $errors->has('weekend_price') ? ' has-error' : '' }}">
		            		{!! Form::label('weekend_price', 'Weekend Price') !!}
		            		{!! Form::text('weekend_price', null,['placeholder'=>'Enter Price for Weekends (Fri - Sat)', 'class'=>'form-control']) !!}
		            		@if ($errors->has('weekend_price'))
	                            <div class="form-control-feedback">{{ $errors->first('weekend_price') }}</div>
	                        @endif
	            		</div>

	            		<div class="form-group col-sm-3 {{ $errors->has('haram_view_price') ? ' has-error' : '' }}">
		            		{!! Form::label('haram_view_price', 'Haram View Room Price') !!}
		            		{!! Form::text('haram_view_price', null,['placeholder'=>'Enter Price for Haram View Room', 'class'=>'form-control']) !!}
		            		@if ($errors->has('haram_view_price'))
	                            <div class="form-control-feedback">{{ $errors->first('haram_view_price') }}</div>
	                        @endif
	            		</div>
            		</div>

	            	<div class="row">
	            		<div class="form-group col-sm-3 {{ $errors->has('bf_per_pax_per_day') ? ' has-error' : '' }}">
		            		{!! Form::label('bf_per_pax_per_day', 'Breakfast/pax/day Price') !!}
		            		{!! Form::text('bf_per_pax_per_day', null,['placeholder'=>'Enter Price for Breakfast per pax per day', 'class'=>'form-control']) !!}
		            		@if ($errors->has('bf_per_pax_per_day'))
	                            <div class="form-control-feedback">{{ $errors->first('bf_per_pax_per_day') }}</div>
	                        @endif
	            		</div>

	            		<div class="form-group col-sm-3 {{ $errors->has('full_board_per_pax_per_day') ? ' has-error' : '' }}">
		            		{!! Form::label('full_board_per_pax_per_day', 'Full-Board/pax/day Price') !!}
		            		{!! Form::text('full_board_per_pax_per_day', null,['placeholder'=>'Enter Price for Full-Board per pax per day', 'class'=>'form-control']) !!}
		            		@if ($errors->has('full_board_per_pax_per_day'))
	                            <div class="form-control-feedback">{{ $errors->first('full_board_per_pax_per_day') }}</div>
	                        @endif
	            		</div>
            		</div>

	            	<div class="row">
	            		<div class="form-group col-sm-3 {{ $errors->has('four_nights_price') ? ' has-error' : '' }}">
		            		{!! Form::label('four_nights_price', 'Four Nights Price') !!}
		            		{!! Form::text('four_nights_price', null,['placeholder'=>'Enter Price for Four Nights', 'class'=>'form-control']) !!}
		            		@if ($errors->has('four_nights_price'))
	                            <div class="form-control-feedback">{{ $errors->first('four_nights_price') }}</div>
	                        @endif
	            		</div>

	            		<div class="form-group col-sm-3 {{ $errors->has('extra_bed_price') ? ' has-error' : '' }}">
		            		{!! Form::label('extra_bed_price', 'Extra Bed Price') !!}
		            		{!! Form::text('extra_bed_price', null,['placeholder'=>'Enter Price for Extra Bed', 'class'=>'form-control']) !!}
		            		@if ($errors->has('extra_bed_price'))
	                            <div class="form-control-feedback">{{ $errors->first('extra_bed_price') }}</div>
	                        @endif
	            		</div>
            		</div>
	            		

	            		<button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>

	            	{!! Form::close() !!}

            		
        			</a>
	            </div>
	        </div>
	    </div>
    </div>
</div>
@stop