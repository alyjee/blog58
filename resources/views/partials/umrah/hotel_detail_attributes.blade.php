<div class="form-group form-group {{ $errors->has('iternary_city') ? ' has-error' : '' }}">
    {!! Form::label('iternary_city', 'City') !!}
    {!! Form::text('iternary_city[]', (isset($iternary_city)) ? $iternary_city : null,['placeholder'=>'Enter City Name', 'class'=>'form-control iternary_city']) !!}
    @if ($errors->has('iternary_city'))
        <div class="form-control-feedback">{{ $errors->first('iternary_city') }}</div>
    @endif
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="form-group {{ $errors->has('iternary_from_date') ? ' has-error' : '' }}">
            {!! Form::label('iternary_from_date', 'From') !!}
            {!! Form::text('iternary_from_date[]', (isset($iternary_from_date)) ? $iternary_from_date : null, ['placeholder'=>'From Date', 'class'=>'form-control mydatepicker iternary_from_date pricing-input']) !!}
            @if ($errors->has('iternary_from_date'))
                <div class="form-control-feedback">{{ $errors->first('iternary_from_date') }}</div>
            @endif
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group {{ $errors->has('iternary_to_date') ? ' has-error' : '' }}">
            {!! Form::label('iternary_to_date', 'To') !!}
            {!! Form::text('iternary_to_date[]', (isset($iternary_to_date)) ? $iternary_to_date : null,['placeholder'=>'To Date', 'class'=>'form-control mydatepicker iternary_to_date pricing-input']) !!}
            @if ($errors->has('to_date'))
                <div class="form-control-feedback">{{ $errors->first('iternary_to_date') }}</div>
            @endif
        </div>
    </div>
</div>

<div class="form-group form-group {{ $errors->has('iternary_hotel_nights') ? ' has-error' : '' }}">
    {!! Form::label('iternary_hotel_nights', 'Nights in City') !!}
    {!! Form::number('iternary_hotel_nights[]', (isset($iternary_hotel_nights)) ? $iternary_hotel_nights : null,['placeholder'=>'Enter Nights in City', 'class'=>'form-control iternary_hotel_nights pricing-input']) !!}
    @if ($errors->has('iternary_hotel_nights'))
        <div class="form-control-feedback">{{ $errors->first('iternary_hotel_nights') }}</div>
    @endif
</div>

<div class="form-group form-group {{ $errors->has('iternary_hotel') ? ' has-error' : '' }}">
	{!! Form::label('iternary_hotel', 'Hotel') !!}
    {!! Form::select('iternary_hotel[]', $hotelSelect, (isset($iternary_hotel)) ? $iternary_hotel : null, ['placeholder'=>'Select Hotel', 'class'=>'form-control iternary_hotel pricing-input']) !!}
	@if ($errors->has('iternary_hotel'))
        <div class="form-control-feedback">{{ $errors->first('iternary_hotel') }}</div>
    @endif
</div>

<div class="form-group form-group {{ $errors->has('iternary_hotel_category') ? ' has-error' : '' }}">
	{!! Form::label('iternary_hotel_category', 'Category') !!}
	{!! Form::text('iternary_hotel_category[]', (isset($iternary_hotel_category)) ? $iternary_hotel_category : null,['placeholder'=>'Select Hotel Category', 'class'=>'form-control iternary_hotel_category', 'readonly'=>'readonly']) !!}
	@if ($errors->has('iternary_hotel_category'))
        <div class="form-control-feedback">{{ $errors->first('iternary_hotel_category') }}</div>
    @endif
</div>

<div class="form-group form-group {{ $errors->has('iternary_hotel_distance_from_haram') ? ' has-error' : '' }}">
    {!! Form::label('iternary_hotel_distance_from_haram', 'Haram Distance') !!}
    {!! Form::text('iternary_hotel_distance_from_haram[]', (isset($iternary_hotel_distance_from_haram)) ? $iternary_hotel_distance_from_haram : null,['class'=>'form-control iternary_hotel_distance_from_haram', 'readonly'=>'readonly']) !!}
    @if ($errors->has('iternary_hotel_distance_from_haram'))
        <div class="form-control-feedback">{{ $errors->first('iternary_hotel_distance_from_haram') }}</div>
    @endif
</div>

<div class="form-group form-group {{ $errors->has('iternary_hotel_meal_plan') ? ' has-error' : '' }}">
	{!! Form::label('iternary_hotel_meal_plan', 'Meal Plan') !!}
	{!! Form::text('iternary_hotel_meal_plan[]', (isset($iternary_hotel_meal_plan)) ? $iternary_hotel_meal_plan : null,['placeholder'=>'Select Hotel Meal Plan', 'class'=>'form-control iternary_hotel_meal_plan', 'readonly'=>'readonly']) !!}
	@if ($errors->has('iternary_hotel_meal_plan'))
        <div class="form-control-feedback">{{ $errors->first('iternary_hotel_meal_plan') }}</div>
    @endif
</div>
