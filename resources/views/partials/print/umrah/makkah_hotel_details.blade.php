<div class="row">
    <div class="col-sm-6">
        <div class="form-group {{ $errors->has('iternary_from_date') ? ' has-error' : '' }}">
            {!! Form::label('iternary_from_date', 'From') !!}
            {!! Form::text('iternary_from_date[]', null,['placeholder'=>'From Date', 'class'=>'form-control mydatepicker iternary_from_date pricing-input']) !!}
            @if ($errors->has('iternary_from_date'))
                <div class="form-control-feedback">{{ $errors->first('iternary_from_date') }}</div>
            @endif
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group {{ $errors->has('iternary_to_date') ? ' has-error' : '' }}">
            {!! Form::label('iternary_to_date', 'To') !!}
            {!! Form::text('iternary_to_date[]', null,['placeholder'=>'To Date', 'class'=>'form-control mydatepicker iternary_to_date pricing-input']) !!}
            @if ($errors->has('to_date'))
                <div class="form-control-feedback">{{ $errors->first('iternary_to_date') }}</div>
            @endif
        </div>
    </div>
</div>

<div class="form-group form-group {{ $errors->has('iternary_hotel_nights') ? ' has-error' : '' }}">
    {!! Form::label('iternary_hotel_nights', 'Nights in Makkah') !!}
    {!! Form::number('iternary_hotel_nights[]', null,['placeholder'=>'Enter Nights in Makkah Hotel', 'class'=>'form-control iternary_hotel_nights pricing-input']) !!}
    @if ($errors->has('iternary_hotel_nights'))
        <div class="form-control-feedback">{{ $errors->first('iternary_hotel_nights') }}</div>
    @endif
</div>

<div class="form-group form-group {{ $errors->has('iternary_hotel') ? ' has-error' : '' }}">
	{!! Form::label('iternary_hotel', 'Makkah Hotel') !!}
    {!! Form::select('iternary_hotel[]', $hotelSelect, null, ['placeholder'=>'Select Hotel For Makkah', 'class'=>'form-control iternary_hotel pricing-input']) !!}
	@if ($errors->has('iternary_hotel'))
        <div class="form-control-feedback">{{ $errors->first('iternary_hotel') }}</div>
    @endif
</div>

<div class="form-group form-group {{ $errors->has('iternary_hotel_category') ? ' has-error' : '' }}">
	{!! Form::label('iternary_hotel_category', 'Category') !!}
	{!! Form::text('iternary_hotel_category[]', null,['placeholder'=>'Select Makkah Hotel Category', 'class'=>'form-control iternary_hotel_category', 'readonly'=>'readonly']) !!}
	@if ($errors->has('iternary_hotel_category'))
        <div class="form-control-feedback">{{ $errors->first('iternary_hotel_category') }}</div>
    @endif
</div>

<div class="form-group form-group {{ $errors->has('iternary_hotel_distance_from_haram') ? ' has-error' : '' }}">
    {!! Form::label('iternary_hotel_distance_from_haram', 'Haram Distance') !!}
    {!! Form::text('iternary_hotel_distance_from_haram[]', null,['class'=>'form-control iternary_hotel_distance_from_haram', 'readonly'=>'readonly']) !!}
    @if ($errors->has('iternary_hotel_distance_from_haram'))
        <div class="form-control-feedback">{{ $errors->first('iternary_hotel_distance_from_haram') }}</div>
    @endif
</div>

<div class="form-group form-group {{ $errors->has('iternary_hotel_meal_plan') ? ' has-error' : '' }}">
	{!! Form::label('iternary_hotel_meal_plan', 'Meal Plan') !!}
	{!! Form::text('iternary_hotel_meal_plan[]', null,['placeholder'=>'Select Makkah Hotel Meal Plan', 'class'=>'form-control iternary_hotel_meal_plan', 'readonly'=>'readonly']) !!}
	@if ($errors->has('iternary_hotel_meal_plan'))
        <div class="form-control-feedback">{{ $errors->first('iternary_hotel_meal_plan') }}</div>
    @endif
</div>

<div class="row makkah-feature-div {{$featureclass}} iternary_double_div">
    <div class="form-group form-group col-sm-6 {{ $errors->has('iternary_double_price') ? ' has-error' : '' }}">
        {!! Form::label('iternary_double_price', 'Double') !!}
        {!! Form::text('iternary_double_price[]', null,['placeholder'=>'', 'class'=>'form-control iternary_double_price', 'readonly'=>'readonly']) !!}
        @if ($errors->has('iternary_double_price'))
            <div class="form-control-feedback">{{ $errors->first('iternary_double_price') }}</div>
        @endif
    </div>
    <div class="form-group form-group col-sm-6 {{ $errors->has('iternary_double_qty') ? ' has-error' : '' }}">
        {!! Form::label('iternary_double_qty', 'Quantity') !!}
        {!! Form::number('iternary_double_qty[]', null,['placeholder'=>'', 'class'=>'form-control pricing-input']) !!}
        @if ($errors->has('iternary_double_qty'))
            <div class="form-control-feedback">{{ $errors->first('iternary_double_qty') }}</div>
        @endif
    </div>
</div>


<div class="row makkah-feature-div {{$featureclass}} iternary_triple_div">
    <div class="form-group form-group col-sm-6 {{ $errors->has('iternary_triple_price') ? ' has-error' : '' }}">
        {!! Form::label('iternary_triple_price', 'Triple') !!}
        {!! Form::text('iternary_triple_price[]', null,['placeholder'=>'', 'class'=>'form-control iternary_triple_price', 'readonly'=>'readonly']) !!}
        @if ($errors->has('iternary_triple_price'))
            <div class="form-control-feedback">{{ $errors->first('iternary_triple_price') }}</div>
        @endif
    </div>
    <div class="form-group form-group col-sm-6 {{ $errors->has('iternary_triple_qty') ? ' has-error' : '' }}">
        {!! Form::label('iternary_triple_qty', 'Quantity') !!}
        {!! Form::number('iternary_triple_qty[]', null,['placeholder'=>'', 'class'=>'form-control pricing-input']) !!}
        @if ($errors->has('iternary_triple_qty'))
            <div class="form-control-feedback">{{ $errors->first('iternary_triple_qty') }}</div>
        @endif
    </div>
</div>


<div class="row makkah-feature-div {{$featureclass}} iternary_quad_div">
    <div class="form-group form-group col-sm-6 {{ $errors->has('iternary_quad_price') ? ' has-error' : '' }}">
        {!! Form::label('iternary_quad_price', 'Quad') !!}
        {!! Form::text('iternary_quad_price[]', null,['placeholder'=>'', 'class'=>'form-control iternary_quad_price', 'readonly'=>'readonly']) !!}
        @if ($errors->has('iternary_quad_price'))
            <div class="form-control-feedback">{{ $errors->first('iternary_quad_price') }}</div>
        @endif
    </div>
    <div class="form-group form-group col-sm-6 {{ $errors->has('iternary_quad_qty') ? ' has-error' : '' }}">
        {!! Form::label('iternary_quad_qty', 'Quantity') !!}
        {!! Form::number('iternary_quad_qty[]', null,['placeholder'=>'', 'class'=>'form-control pricing-input']) !!}
        @if ($errors->has('iternary_quad_qty'))
            <div class="form-control-feedback">{{ $errors->first('iternary_quad_qty') }}</div>
        @endif
    </div>
</div>


<div class="row makkah-feature-div {{$featureclass}} iternary_quint_div">
    <div class="form-group form-group col-sm-6 {{ $errors->has('iternary_quint_price') ? ' has-error' : '' }}">
        {!! Form::label('iternary_quint_price', 'Quint') !!}
        {!! Form::text('iternary_quint_price[]', null,['placeholder'=>'', 'class'=>'form-control iternary_quint_price', 'readonly'=>'readonly']) !!}
        @if ($errors->has('iternary_quint_price'))
            <div class="form-control-feedback">{{ $errors->first('iternary_quint_price') }}</div>
        @endif
    </div>
    <div class="form-group form-group col-sm-6 {{ $errors->has('iternary_quint_qty') ? ' has-error' : '' }}">
        {!! Form::label('iternary_quint_qty', 'Quantity') !!}
        {!! Form::number('iternary_quint_qty[]', null,['placeholder'=>'', 'class'=>'form-control pricing-input']) !!}
        @if ($errors->has('iternary_quint_qty'))
            <div class="form-control-feedback">{{ $errors->first('iternary_quint_qty') }}</div>
        @endif
    </div>
</div>

<div class="row makkah-feature-div {{$featureclass}} iternary_sharing_div">
    <div class="form-group form-group col-sm-6 {{ $errors->has('iternary_sharing_price') ? ' has-error' : '' }}">
        {!! Form::label('iternary_sharing_price', 'Sharing') !!}
        {!! Form::text('iternary_sharing_price[]', null,['placeholder'=>'', 'class'=>'form-control iternary_sharing_price', 'readonly'=>'readonly']) !!}
        @if ($errors->has('iternary_sharing_price'))
            <div class="form-control-feedback">{{ $errors->first('iternary_sharing_price') }}</div>
        @endif
    </div>
    <div class="form-group form-group col-sm-6 {{ $errors->has('iternary_sharing_qty') ? ' has-error' : '' }}">
        {!! Form::label('iternary_sharing_qty', 'Quantity') !!}
        {!! Form::number('iternary_sharing_qty[]', null,['placeholder'=>'', 'class'=>'form-control pricing-input']) !!}
        @if ($errors->has('iternary_sharing_qty'))
            <div class="form-control-feedback">{{ $errors->first('iternary_sharing_qty') }}</div>
        @endif
    </div>
</div>

<div class="row makkah-feature-div {{$featureclass}} iternary_weekend_price_div">
    <div class="form-group form-group col-sm-6 {{ $errors->has('iternary_weekend_price_price') ? ' has-error' : '' }}">
        {!! Form::label('iternary_weekend_price_price', 'Weekend Price') !!}
        {!! Form::text('iternary_weekend_price_price[]', null,['placeholder'=>'', 'class'=>'form-control pricing-input iternary_weekend_price_price', 'readonly'=>'readonly']) !!}
        @if ($errors->has('iternary_weekend_price_price'))
            <div class="form-control-feedback">{{ $errors->first('iternary_weekend_price_price') }}</div>
        @endif
    </div>
    <div class="form-group form-group col-sm-6 {{ $errors->has('iternary_weekend_price_qty') ? ' has-error' : '' }}">
        {!! Form::label('iternary_weekend_price_qty', 'Quantity') !!}
        {!! Form::number('iternary_weekend_price_qty[]', null,['placeholder'=>'', 'class'=>'form-control pricing-input']) !!}
        @if ($errors->has('iternary_weekend_price_qty'))
            <div class="form-control-feedback">{{ $errors->first('iternary_weekend_price_qty') }}</div>
        @endif
    </div>
</div>

<div class="row makkah-feature-div {{$featureclass}} iternary_haram_view_price_div">
    <div class="form-group form-group col-sm-6 {{ $errors->has('iternary_haram_view_price_price') ? ' has-error' : '' }}">
        {!! Form::label('iternary_haram_view_price_price', 'Haram View Price') !!}
        {!! Form::text('iternary_haram_view_price_price[]', null,['placeholder'=>'', 'class'=>'form-control iternary_haram_view_price_price', 'readonly'=>'readonly']) !!}
        @if ($errors->has('iternary_haram_view_price_price'))
            <div class="form-control-feedback">{{ $errors->first('iternary_haram_view_price_price') }}</div>
        @endif
    </div>
    <div class="form-group form-group col-sm-6 {{ $errors->has('iternary_haram_view_price_qty') ? ' has-error' : '' }}">
        {!! Form::label('iternary_haram_view_price_qty', 'Quantity') !!}
        {!! Form::number('iternary_haram_view_price_qty[]', null,['placeholder'=>'', 'class'=>'form-control pricing-input']) !!}
        @if ($errors->has('iternary_haram_view_price_qty'))
            <div class="form-control-feedback">{{ $errors->first('iternary_haram_view_price_qty') }}</div>
        @endif
    </div>
</div>

<div class="row makkah-feature-div {{$featureclass}} iternary_full_board_per_pax_per_day_div">
    <div class="form-group form-group col-sm-6 {{ $errors->has('iternary_full_board_per_pax_per_day_price') ? ' has-error' : '' }}">
        {!! Form::label('iternary_full_board_per_pax_per_day_price', 'Full Board/pax/Day') !!}
        {!! Form::text('iternary_full_board_per_pax_per_day_price[]', null,['placeholder'=>'', 'class'=>'form-control iternary_full_board_per_pax_per_day_price', 'readonly'=>'readonly']) !!}
        @if ($errors->has('iternary_full_board_per_pax_per_day_price'))
            <div class="form-control-feedback">{{ $errors->first('iternary_full_board_per_pax_per_day_price') }}</div>
        @endif
    </div>
    <div class="form-group form-group col-sm-6 {{ $errors->has('iternary_full_board_per_pax_per_day_qty') ? ' has-error' : '' }}">
        {!! Form::label('iternary_full_board_per_pax_per_day_qty', 'Quantity') !!}
        {!! Form::number('iternary_full_board_per_pax_per_day_qty[]', null,['placeholder'=>'', 'class'=>'form-control pricing-input']) !!}
        @if ($errors->has('iternary_full_board_per_pax_per_day_qty'))
            <div class="form-control-feedback">{{ $errors->first('iternary_full_board_per_pax_per_day_qty') }}</div>
        @endif
    </div>
</div>

<div class="row makkah-feature-div {{$featureclass}} iternary_four_nights_price_div">
    <div class="form-group form-group col-sm-6 {{ $errors->has('iternary_four_nights_price_price') ? ' has-error' : '' }}">
        {!! Form::label('iternary_four_nights_price_price', 'Four Nights') !!}
        {!! Form::text('iternary_four_nights_price_price[]', null,['placeholder'=>'', 'class'=>'form-control iternary_four_nights_price_price', 'readonly'=>'readonly']) !!}
        @if ($errors->has('iternary_four_nights_price_price'))
            <div class="form-control-feedback">{{ $errors->first('iternary_four_nights_price_price') }}</div>
        @endif
    </div>
    <div class="form-group form-group col-sm-6 {{ $errors->has('iternary_four_nights_price_qty') ? ' has-error' : '' }}">
        {!! Form::label('iternary_four_nights_price_qty', 'Quantity') !!}
        {!! Form::number('iternary_four_nights_price_qty[]', null,['placeholder'=>'', 'class'=>'form-control pricing-input']) !!}
        @if ($errors->has('iternary_four_nights_price_qty'))
            <div class="form-control-feedback">{{ $errors->first('iternary_four_nights_price_qty') }}</div>
        @endif
    </div>
</div>

<div class="row makkah-feature-div {{$featureclass}} iternary_extra_bed_price_div">
    <div class="form-group form-group col-sm-6 {{ $errors->has('iternary_extra_bed_price_price') ? ' has-error' : '' }}">
        {!! Form::label('iternary_extra_bed_price_price', 'Extra Bed') !!}
        {!! Form::text('iternary_extra_bed_price_price[]', null,['placeholder'=>'', 'class'=>'form-control iternary_extra_bed_price_price', 'readonly'=>'readonly']) !!}
        @if ($errors->has('iternary_extra_bed_price_price'))
            <div class="form-control-feedback">{{ $errors->first('iternary_extra_bed_price_price') }}</div>
        @endif
    </div>
    <div class="form-group form-group col-sm-6 {{ $errors->has('iternary_extra_bed_price_qty') ? ' has-error' : '' }}">
        {!! Form::label('iternary_extra_bed_price_qty', 'Quantity') !!}
        {!! Form::number('iternary_extra_bed_price_qty[]', null,['placeholder'=>'', 'class'=>'form-control pricing-input']) !!}
        @if ($errors->has('iternary_extra_bed_price_qty'))
            <div class="form-control-feedback">{{ $errors->first('iternary_extra_bed_price_qty') }}</div>
        @endif
    </div>
</div>