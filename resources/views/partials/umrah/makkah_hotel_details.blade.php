<div class="row">
    <div class="col-sm-6">
        <div class="form-group {{ $errors->has('makkah_from_date') ? ' has-error' : '' }}">
            {!! Form::label('makkah_from_date', 'From') !!}
            {!! Form::text('makkah_from_date', null,['placeholder'=>'From Date', 'class'=>'form-control mydatepicker']) !!}
            @if ($errors->has('makkah_from_date'))
                <div class="form-control-feedback">{{ $errors->first('makkah_from_date') }}</div>
            @endif
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group {{ $errors->has('makkah_to_date') ? ' has-error' : '' }}">
            {!! Form::label('makkah_to_date', 'To') !!}
            {!! Form::text('makkah_to_date', null,['placeholder'=>'To Date', 'class'=>'form-control mydatepicker']) !!}
            @if ($errors->has('to_date'))
                <div class="form-control-feedback">{{ $errors->first('makkah_to_date') }}</div>
            @endif
        </div>
    </div>
</div>

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

<div class="row feature-div hide" id="makkah_double_div">
    <div class="form-group form-group col-sm-6 {{ $errors->has('makkah_double_price') ? ' has-error' : '' }}">
        {!! Form::label('makkah_double_price', 'Double') !!}
        {!! Form::text('makkah_double_price', null,['placeholder'=>'', 'class'=>'form-control', 'readonly'=>'readonly']) !!}
        @if ($errors->has('makkah_double_price'))
            <div class="form-control-feedback">{{ $errors->first('makkah_double_price') }}</div>
        @endif
    </div>
    <div class="form-group form-group col-sm-6 {{ $errors->has('makkah_double_qty') ? ' has-error' : '' }}">
        {!! Form::label('makkah_double_qty', 'Quantity') !!}
        {!! Form::number('makkah_double_qty', null,['placeholder'=>'', 'class'=>'form-control']) !!}
        @if ($errors->has('makkah_double_qty'))
            <div class="form-control-feedback">{{ $errors->first('makkah_double_qty') }}</div>
        @endif
    </div>
</div>


<div class="row feature-div hide" id="makkah_triple_div">
    <div class="form-group form-group col-sm-6 {{ $errors->has('makkah_triple_price') ? ' has-error' : '' }}">
        {!! Form::label('makkah_triple_price', 'Triple') !!}
        {!! Form::text('makkah_triple_price', null,['placeholder'=>'', 'class'=>'form-control', 'readonly'=>'readonly']) !!}
        @if ($errors->has('makkah_triple_price'))
            <div class="form-control-feedback">{{ $errors->first('makkah_triple_price') }}</div>
        @endif
    </div>
    <div class="form-group form-group col-sm-6 {{ $errors->has('makkah_triple_qty') ? ' has-error' : '' }}">
        {!! Form::label('makkah_triple_qty', 'Quantity') !!}
        {!! Form::number('makkah_triple_qty', null,['placeholder'=>'', 'class'=>'form-control']) !!}
        @if ($errors->has('makkah_triple_qty'))
            <div class="form-control-feedback">{{ $errors->first('makkah_triple_qty') }}</div>
        @endif
    </div>
</div>


<div class="row feature-div hide" id="makkah_quad_div">
    <div class="form-group form-group col-sm-6 {{ $errors->has('makkah_quad_price') ? ' has-error' : '' }}">
        {!! Form::label('makkah_quad_price', 'Quad') !!}
        {!! Form::text('makkah_quad_price', null,['placeholder'=>'', 'class'=>'form-control', 'readonly'=>'readonly']) !!}
        @if ($errors->has('makkah_quad_price'))
            <div class="form-control-feedback">{{ $errors->first('makkah_quad_price') }}</div>
        @endif
    </div>
    <div class="form-group form-group col-sm-6 {{ $errors->has('makkah_quad_qty') ? ' has-error' : '' }}">
        {!! Form::label('makkah_quad_qty', 'Quantity') !!}
        {!! Form::number('makkah_quad_qty', null,['placeholder'=>'', 'class'=>'form-control']) !!}
        @if ($errors->has('makkah_quad_qty'))
            <div class="form-control-feedback">{{ $errors->first('makkah_quad_qty') }}</div>
        @endif
    </div>
</div>


<div class="row feature-div hide" id="makkah_quint_div">
    <div class="form-group form-group col-sm-6 {{ $errors->has('makkah_quint_price') ? ' has-error' : '' }}">
        {!! Form::label('makkah_quint_price', 'Quint') !!}
        {!! Form::text('makkah_quint_price', null,['placeholder'=>'', 'class'=>'form-control', 'readonly'=>'readonly']) !!}
        @if ($errors->has('makkah_quint_price'))
            <div class="form-control-feedback">{{ $errors->first('makkah_quint_price') }}</div>
        @endif
    </div>
    <div class="form-group form-group col-sm-6 {{ $errors->has('makkah_quint_qty') ? ' has-error' : '' }}">
        {!! Form::label('makkah_quint_qty', 'Quantity') !!}
        {!! Form::number('makkah_quint_qty', null,['placeholder'=>'', 'class'=>'form-control']) !!}
        @if ($errors->has('makkah_quint_qty'))
            <div class="form-control-feedback">{{ $errors->first('makkah_quint_qty') }}</div>
        @endif
    </div>
</div>

<div class="row feature-div hide" id="makkah_sharing_div">
    <div class="form-group form-group col-sm-6 {{ $errors->has('makkah_sharing_price') ? ' has-error' : '' }}">
        {!! Form::label('makkah_sharing_price', 'Sharing') !!}
        {!! Form::text('makkah_sharing_price', null,['placeholder'=>'', 'class'=>'form-control', 'readonly'=>'readonly']) !!}
        @if ($errors->has('makkah_sharing_price'))
            <div class="form-control-feedback">{{ $errors->first('makkah_sharing_price') }}</div>
        @endif
    </div>
    <div class="form-group form-group col-sm-6 {{ $errors->has('makkah_sharing_qty') ? ' has-error' : '' }}">
        {!! Form::label('makkah_sharing_qty', 'Quantity') !!}
        {!! Form::number('makkah_sharing_qty', null,['placeholder'=>'', 'class'=>'form-control']) !!}
        @if ($errors->has('makkah_sharing_qty'))
            <div class="form-control-feedback">{{ $errors->first('makkah_sharing_qty') }}</div>
        @endif
    </div>
</div>

<div class="row feature-div hide" id="makkah_weekend_price_div">
    <div class="form-group form-group col-sm-6 {{ $errors->has('makkah_weekend_price_price') ? ' has-error' : '' }}">
        {!! Form::label('makkah_weekend_price_price', 'Weekend Price') !!}
        {!! Form::text('makkah_weekend_price_price', null,['placeholder'=>'', 'class'=>'form-control', 'readonly'=>'readonly']) !!}
        @if ($errors->has('makkah_weekend_price_price'))
            <div class="form-control-feedback">{{ $errors->first('makkah_weekend_price_price') }}</div>
        @endif
    </div>
    <div class="form-group form-group col-sm-6 {{ $errors->has('makkah_weekend_price_qty') ? ' has-error' : '' }}">
        {!! Form::label('makkah_weekend_price_qty', 'Quantity') !!}
        {!! Form::number('makkah_weekend_price_qty', null,['placeholder'=>'', 'class'=>'form-control']) !!}
        @if ($errors->has('makkah_weekend_price_qty'))
            <div class="form-control-feedback">{{ $errors->first('makkah_weekend_price_qty') }}</div>
        @endif
    </div>
</div>

<div class="row feature-div hide" id="makkah_haram_view_price_div">
    <div class="form-group form-group col-sm-6 {{ $errors->has('makkah_haram_view_price_price') ? ' has-error' : '' }}">
        {!! Form::label('makkah_haram_view_price_price', 'Haram View Price') !!}
        {!! Form::text('makkah_haram_view_price_price', null,['placeholder'=>'', 'class'=>'form-control', 'readonly'=>'readonly']) !!}
        @if ($errors->has('makkah_haram_view_price_price'))
            <div class="form-control-feedback">{{ $errors->first('makkah_haram_view_price_price') }}</div>
        @endif
    </div>
    <div class="form-group form-group col-sm-6 {{ $errors->has('makkah_haram_view_price_qty') ? ' has-error' : '' }}">
        {!! Form::label('makkah_haram_view_price_qty', 'Quantity') !!}
        {!! Form::number('makkah_haram_view_price_qty', null,['placeholder'=>'', 'class'=>'form-control']) !!}
        @if ($errors->has('makkah_haram_view_price_qty'))
            <div class="form-control-feedback">{{ $errors->first('makkah_haram_view_price_qty') }}</div>
        @endif
    </div>
</div>

<div class="row feature-div hide" id="makkah_full_board_per_pax_per_day_div">
    <div class="form-group form-group col-sm-6 {{ $errors->has('makkah_full_board_per_pax_per_day_price') ? ' has-error' : '' }}">
        {!! Form::label('makkah_full_board_per_pax_per_day_price', 'Full Board/pax/Day') !!}
        {!! Form::text('makkah_full_board_per_pax_per_day_price', null,['placeholder'=>'', 'class'=>'form-control', 'readonly'=>'readonly']) !!}
        @if ($errors->has('makkah_full_board_per_pax_per_day_price'))
            <div class="form-control-feedback">{{ $errors->first('makkah_full_board_per_pax_per_day_price') }}</div>
        @endif
    </div>
    <div class="form-group form-group col-sm-6 {{ $errors->has('makkah_full_board_per_pax_per_day_qty') ? ' has-error' : '' }}">
        {!! Form::label('makkah_full_board_per_pax_per_day_qty', 'Quantity') !!}
        {!! Form::number('makkah_full_board_per_pax_per_day_qty', null,['placeholder'=>'', 'class'=>'form-control']) !!}
        @if ($errors->has('makkah_full_board_per_pax_per_day_qty'))
            <div class="form-control-feedback">{{ $errors->first('makkah_full_board_per_pax_per_day_qty') }}</div>
        @endif
    </div>
</div>

<div class="row feature-div hide" id="makkah_four_nights_price_div">
    <div class="form-group form-group col-sm-6 {{ $errors->has('makkah_four_nights_price_price') ? ' has-error' : '' }}">
        {!! Form::label('makkah_four_nights_price_price', 'Four Nights') !!}
        {!! Form::text('makkah_four_nights_price_price', null,['placeholder'=>'', 'class'=>'form-control', 'readonly'=>'readonly']) !!}
        @if ($errors->has('makkah_four_nights_price_price'))
            <div class="form-control-feedback">{{ $errors->first('makkah_four_nights_price_price') }}</div>
        @endif
    </div>
    <div class="form-group form-group col-sm-6 {{ $errors->has('makkah_four_nights_price_qty') ? ' has-error' : '' }}">
        {!! Form::label('makkah_four_nights_price_qty', 'Quantity') !!}
        {!! Form::number('makkah_four_nights_price_qty', null,['placeholder'=>'', 'class'=>'form-control']) !!}
        @if ($errors->has('makkah_four_nights_price_qty'))
            <div class="form-control-feedback">{{ $errors->first('makkah_four_nights_price_qty') }}</div>
        @endif
    </div>
</div>

<div class="row feature-div hide" id="makkah_extra_bed_price_div">
    <div class="form-group form-group col-sm-6 {{ $errors->has('makkah_extra_bed_price_price') ? ' has-error' : '' }}">
        {!! Form::label('makkah_extra_bed_price_price', 'Extra Bed') !!}
        {!! Form::text('makkah_extra_bed_price_price', null,['placeholder'=>'', 'class'=>'form-control', 'readonly'=>'readonly']) !!}
        @if ($errors->has('makkah_extra_bed_price_price'))
            <div class="form-control-feedback">{{ $errors->first('makkah_extra_bed_price_price') }}</div>
        @endif
    </div>
    <div class="form-group form-group col-sm-6 {{ $errors->has('makkah_extra_bed_price_qty') ? ' has-error' : '' }}">
        {!! Form::label('makkah_extra_bed_price_qty', 'Quantity') !!}
        {!! Form::number('makkah_extra_bed_price_qty', null,['placeholder'=>'', 'class'=>'form-control']) !!}
        @if ($errors->has('makkah_extra_bed_price_qty'))
            <div class="form-control-feedback">{{ $errors->first('makkah_extra_bed_price_qty') }}</div>
        @endif
    </div>
</div>