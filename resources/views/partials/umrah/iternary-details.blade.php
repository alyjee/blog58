<div class="row">
	<div class="col-sm-12 text-center">
		<h3>ITERNARY DETAILS</h3>
	</div>
</div>

<div class="row">
	<div class="col-sm-6">
        <div class="form-group form-group {{ $errors->has('makkah_hotel_nights') ? ' has-error' : '' }}">
            {!! Form::label('makkah_hotel_nights', 'Nights in Makkah') !!}
            {!! Form::number('makkah_hotel_nights', null,['placeholder'=>'Enter Nights in Makkah Hotel', 'class'=>'form-control']) !!}
            @if ($errors->has('makkah_hotel_nights'))
                <div class="form-control-feedback">{{ $errors->first('makkah_hotel_nights') }}</div>
            @endif
        </div>

		<div class="form-group form-group {{ $errors->has('makkah_hotel') ? ' has-error' : '' }}">
    		{!! Form::label('makkah_hotel', 'Makkah Hotel') !!}
            {!! Form::select('makkah_hotel', $hotelSelect, null, ['placeholder'=>'Select Hotel For Makkah', 'class'=>'form-control']) !!}
    		@if ($errors->has('makkah_hotel'))
                <div class="form-control-feedback">{{ $errors->first('makkah_hotel') }}</div>
            @endif
		</div>

		<div class="form-group form-group {{ $errors->has('makkah_hotel_category') ? ' has-error' : '' }}">
    		{!! Form::label('makkah_hotel_category', 'Category') !!}
    		{!! Form::text('makkah_hotel_category', null,['placeholder'=>'Select Makkah Hotel Category', 'class'=>'form-control', 'readonly'=>'readonly']) !!}
    		@if ($errors->has('makkah_hotel_category'))
                <div class="form-control-feedback">{{ $errors->first('makkah_hotel_category') }}</div>
            @endif
		</div>

		<div class="form-group form-group {{ $errors->has('makkah_hotel_meal_plan') ? ' has-error' : '' }}">
    		{!! Form::label('makkah_hotel_meal_plan', 'Meal Plan') !!}
    		{!! Form::text('makkah_hotel_meal_plan', null,['placeholder'=>'Select Makkah Hotel Meal Plan', 'class'=>'form-control', 'readonly'=>'readonly']) !!}
    		@if ($errors->has('makkah_hotel_meal_plan'))
                <div class="form-control-feedback">{{ $errors->first('makkah_hotel_meal_plan') }}</div>
            @endif
		</div>

        <div class="form-group form-group hide {{ $errors->has('makkah_hotel_room_price') ? ' has-error' : '' }}">
            {!! Form::label('makkah_hotel_room_price', 'Room Price') !!}
            {!! Form::hidden('makkah_hotel_room_price', null,['placeholder'=>'', 'class'=>'form-control', 'readonly'=>'readonly']) !!}
            @if ($errors->has('makkah_hotel_room_price'))
                <div class="form-control-feedback">{{ $errors->first('makkah_hotel_room_price') }}</div>
            @endif
        </div>
	</div>

	<div class="col-sm-6">
        <div class="form-group form-group {{ $errors->has('madinah_hotel_nights') ? ' has-error' : '' }}">
            {!! Form::label('madinah_hotel_nights', 'Nights in Madinah') !!}
            {!! Form::number('madinah_hotel_nights', null,['placeholder'=>'Enter Nights in Madinah Hotel', 'class'=>'form-control']) !!}
            @if ($errors->has('madinah_hotel_nights'))
                <div class="form-control-feedback">{{ $errors->first('madinah_hotel_nights') }}</div>
            @endif
        </div>

		<div class="form-group form-group {{ $errors->has('madinah_hotel') ? ' has-error' : '' }}">
    		{!! Form::label('madinah_hotel', 'Madinah Hotel') !!}
            {!! Form::select('madinah_hotel', $hotelSelect, null, ['placeholder'=>'Select Madinah Hotel', 'class'=>'form-control']) !!}
    		@if ($errors->has('madinah_hotel'))
                <div class="form-control-feedback">{{ $errors->first('madinah_hotel') }}</div>
            @endif
		</div>

		<div class="form-group form-group {{ $errors->has('madinah_hotel_category') ? ' has-error' : '' }}">
    		{!! Form::label('madinah_hotel_category', 'Category') !!}
    		{!! Form::text('madinah_hotel_category', null,['placeholder'=>'Select Madinah Hotel Category', 'class'=>'form-control', 'readonly'=>'readonly']) !!}
    		@if ($errors->has('madinah_hotel_category'))
                <div class="form-control-feedback">{{ $errors->first('madinah_hotel_category') }}</div>
            @endif
		</div>

		<div class="form-group form-group {{ $errors->has('madinah_hotel_meal_plan') ? ' has-error' : '' }}">
    		{!! Form::label('madinah_hotel_meal_plan', 'Meal Plan') !!}
    		{!! Form::text('madinah_hotel_meal_plan', null,['placeholder'=>'Select Madinah Hotel Meal Plan', 'class'=>'form-control', 'readonly'=>'readonly']) !!}
    		@if ($errors->has('madinah_hotel_meal_plan'))
                <div class="form-control-feedback">{{ $errors->first('madinah_hotel_meal_plan') }}</div>
            @endif
		</div>

        <div class="form-group form-group hide {{ $errors->has('madinah_hotel_room_price') ? ' has-error' : '' }}">
            {!! Form::label('madinah_hotel_room_price', 'Room Price') !!}
            {!! Form::hidden('madinah_hotel_room_price', null,['placeholder'=>'', 'class'=>'form-control', 'readonly'=>'readonly']) !!}
            @if ($errors->has('madinah_hotel_room_price'))
                <div class="form-control-feedback">{{ $errors->first('madinah_hotel_room_price') }}</div>
            @endif
        </div>
	</div>
</div>

<div class="row">
	<div class="col-sm-6">
		<p><b>Includes: </b> Visa Charges</p>
	</div>
</div>

<hr />