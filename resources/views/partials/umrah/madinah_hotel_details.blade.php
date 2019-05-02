<div class="row">
    <div class="col-sm-6">
        <div class="form-group {{ $errors->has('madinah_from_date') ? ' has-error' : '' }}">
            {!! Form::label('madinah_from_date', 'From') !!}
            {!! Form::text('madinah_from_date', null,['placeholder'=>'From Date', 'class'=>'form-control mydatepicker']) !!}
            @if ($errors->has('madinah_from_date'))
                <div class="form-control-feedback">{{ $errors->first('madinah_from_date') }}</div>
            @endif
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group {{ $errors->has('madinah_to_date') ? ' has-error' : '' }}">
            {!! Form::label('madinah_to_date', 'To') !!}
            {!! Form::text('madinah_to_date', null,['placeholder'=>'To Date', 'class'=>'form-control mydatepicker']) !!}
            @if ($errors->has('madinah_to_date'))
                <div class="form-control-feedback">{{ $errors->first('madinah_to_date') }}</div>
            @endif
        </div>
    </div>
</div>
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

<div class="row feature-div hide" id="madinah_double_div">
    <div class="form-group form-group col-sm-6 {{ $errors->has('madinah_double_price') ? ' has-error' : '' }}">
        {!! Form::label('madinah_double_price', 'Double') !!}
        {!! Form::text('madinah_double_price', null,['placeholder'=>'', 'class'=>'form-control', 'readonly'=>'readonly']) !!}
        @if ($errors->has('madinah_double_price'))
            <div class="form-control-feedback">{{ $errors->first('madinah_double_price') }}</div>
        @endif
    </div>
    <div class="form-group form-group col-sm-6 {{ $errors->has('madinah_double_qty') ? ' has-error' : '' }}">
        {!! Form::label('madinah_double_qty', 'Quantity') !!}
        {!! Form::number('madinah_double_qty', null,['placeholder'=>'', 'class'=>'form-control']) !!}
        @if ($errors->has('madinah_double_qty'))
            <div class="form-control-feedback">{{ $errors->first('madinah_double_qty') }}</div>
        @endif
    </div>
</div>


<div class="row feature-div hide" id="madinah_triple_div">
    <div class="form-group form-group col-sm-6 {{ $errors->has('madinah_triple_price') ? ' has-error' : '' }}">
        {!! Form::label('madinah_triple_price', 'Triple') !!}
        {!! Form::text('madinah_triple_price', null,['placeholder'=>'', 'class'=>'form-control', 'readonly'=>'readonly']) !!}
        @if ($errors->has('madinah_triple_price'))
            <div class="form-control-feedback">{{ $errors->first('madinah_triple_price') }}</div>
        @endif
    </div>
    <div class="form-group form-group col-sm-6 {{ $errors->has('madinah_triple_qty') ? ' has-error' : '' }}">
        {!! Form::label('madinah_triple_qty', 'Quantity') !!}
        {!! Form::number('madinah_triple_qty', null,['placeholder'=>'', 'class'=>'form-control']) !!}
        @if ($errors->has('madinah_triple_qty'))
            <div class="form-control-feedback">{{ $errors->first('madinah_triple_qty') }}</div>
        @endif
    </div>
</div>


<div class="row feature-div hide" id="madinah_quad_div">
    <div class="form-group form-group col-sm-6 {{ $errors->has('madinah_quad_price') ? ' has-error' : '' }}">
        {!! Form::label('madinah_quad_price', 'Quad') !!}
        {!! Form::text('madinah_quad_price', null,['placeholder'=>'', 'class'=>'form-control', 'readonly'=>'readonly']) !!}
        @if ($errors->has('madinah_quad_price'))
            <div class="form-control-feedback">{{ $errors->first('madinah_quad_price') }}</div>
        @endif
    </div>
    <div class="form-group form-group col-sm-6 {{ $errors->has('madinah_quad_qty') ? ' has-error' : '' }}">
        {!! Form::label('madinah_quad_qty', 'Quantity') !!}
        {!! Form::number('madinah_quad_qty', null,['placeholder'=>'', 'class'=>'form-control']) !!}
        @if ($errors->has('madinah_quad_qty'))
            <div class="form-control-feedback">{{ $errors->first('madinah_quad_qty') }}</div>
        @endif
    </div>
</div>


<div class="row feature-div hide" id="madinah_quint_div">
    <div class="form-group form-group col-sm-6 {{ $errors->has('madinah_quint_price') ? ' has-error' : '' }}">
        {!! Form::label('madinah_quint_price', 'Quint') !!}
        {!! Form::text('madinah_quint_price', null,['placeholder'=>'', 'class'=>'form-control', 'readonly'=>'readonly']) !!}
        @if ($errors->has('madinah_quint_price'))
            <div class="form-control-feedback">{{ $errors->first('madinah_quint_price') }}</div>
        @endif
    </div>
    <div class="form-group form-group col-sm-6 {{ $errors->has('madinah_quint_qty') ? ' has-error' : '' }}">
        {!! Form::label('madinah_quint_qty', 'Quantity') !!}
        {!! Form::number('madinah_quint_qty', null,['placeholder'=>'', 'class'=>'form-control']) !!}
        @if ($errors->has('madinah_quint_qty'))
            <div class="form-control-feedback">{{ $errors->first('madinah_quint_qty') }}</div>
        @endif
    </div>
</div>

<div class="row feature-div hide" id="madinah_sharing_div">
    <div class="form-group form-group col-sm-6 {{ $errors->has('madinah_sharing_price') ? ' has-error' : '' }}">
        {!! Form::label('madinah_sharing_price', 'Sharing') !!}
        {!! Form::text('madinah_sharing_price', null,['placeholder'=>'', 'class'=>'form-control', 'readonly'=>'readonly']) !!}
        @if ($errors->has('madinah_sharing_price'))
            <div class="form-control-feedback">{{ $errors->first('madinah_sharing_price') }}</div>
        @endif
    </div>
    <div class="form-group form-group col-sm-6 {{ $errors->has('madinah_sharing_qty') ? ' has-error' : '' }}">
        {!! Form::label('madinah_sharing_qty', 'Quantity') !!}
        {!! Form::number('madinah_sharing_qty', null,['placeholder'=>'', 'class'=>'form-control']) !!}
        @if ($errors->has('madinah_sharing_qty'))
            <div class="form-control-feedback">{{ $errors->first('madinah_sharing_qty') }}</div>
        @endif
    </div>
</div>

<div class="row feature-div hide" id="madinah_weekend_price_div">
    <div class="form-group form-group col-sm-6 {{ $errors->has('madinah_weekend_price_price') ? ' has-error' : '' }}">
        {!! Form::label('madinah_weekend_price_price', 'Weekend Price') !!}
        {!! Form::text('madinah_weekend_price_price', null,['placeholder'=>'', 'class'=>'form-control', 'readonly'=>'readonly']) !!}
        @if ($errors->has('madinah_weekend_price_price'))
            <div class="form-control-feedback">{{ $errors->first('madinah_weekend_price_price') }}</div>
        @endif
    </div>
    <div class="form-group form-group col-sm-6 {{ $errors->has('madinah_weekend_price_qty') ? ' has-error' : '' }}">
        {!! Form::label('madinah_weekend_price_qty', 'Quantity') !!}
        {!! Form::number('madinah_weekend_price_qty', null,['placeholder'=>'', 'class'=>'form-control']) !!}
        @if ($errors->has('madinah_weekend_price_qty'))
            <div class="form-control-feedback">{{ $errors->first('madinah_weekend_price_qty') }}</div>
        @endif
    </div>
</div>

<div class="row feature-div hide" id="madinah_haram_view_price_div">
    <div class="form-group form-group col-sm-6 {{ $errors->has('madinah_haram_view_price_price') ? ' has-error' : '' }}">
        {!! Form::label('madinah_haram_view_price_price', 'Haram View Price') !!}
        {!! Form::text('madinah_haram_view_price_price', null,['placeholder'=>'', 'class'=>'form-control', 'readonly'=>'readonly']) !!}
        @if ($errors->has('madinah_haram_view_price_price'))
            <div class="form-control-feedback">{{ $errors->first('madinah_haram_view_price_price') }}</div>
        @endif
    </div>
    <div class="form-group form-group col-sm-6 {{ $errors->has('madinah_haram_view_price_qty') ? ' has-error' : '' }}">
        {!! Form::label('madinah_haram_view_price_qty', 'Quantity') !!}
        {!! Form::number('madinah_haram_view_price_qty', null,['placeholder'=>'', 'class'=>'form-control']) !!}
        @if ($errors->has('madinah_haram_view_price_qty'))
            <div class="form-control-feedback">{{ $errors->first('madinah_haram_view_price_qty') }}</div>
        @endif
    </div>
</div>

<div class="row feature-div hide" id="madinah_full_board_per_pax_per_day_div">
    <div class="form-group form-group col-sm-6 {{ $errors->has('madinah_full_board_per_pax_per_day_price') ? ' has-error' : '' }}">
        {!! Form::label('madinah_full_board_per_pax_per_day_price', 'Full Board/pax/Day') !!}
        {!! Form::text('madinah_full_board_per_pax_per_day_price', null,['placeholder'=>'', 'class'=>'form-control', 'readonly'=>'readonly']) !!}
        @if ($errors->has('madinah_full_board_per_pax_per_day_price'))
            <div class="form-control-feedback">{{ $errors->first('madinah_full_board_per_pax_per_day_price') }}</div>
        @endif
    </div>
    <div class="form-group form-group col-sm-6 {{ $errors->has('madinah_full_board_per_pax_per_day_qty') ? ' has-error' : '' }}">
        {!! Form::label('madinah_full_board_per_pax_per_day_qty', 'Quantity') !!}
        {!! Form::number('madinah_full_board_per_pax_per_day_qty', null,['placeholder'=>'', 'class'=>'form-control']) !!}
        @if ($errors->has('madinah_full_board_per_pax_per_day_qty'))
            <div class="form-control-feedback">{{ $errors->first('madinah_full_board_per_pax_per_day_qty') }}</div>
        @endif
    </div>
</div>

<div class="row feature-div hide" id="madinah_four_nights_price_div">
    <div class="form-group form-group col-sm-6 {{ $errors->has('madinah_four_nights_price_price') ? ' has-error' : '' }}">
        {!! Form::label('madinah_four_nights_price_price', 'Four Nights') !!}
        {!! Form::text('madinah_four_nights_price_price', null,['placeholder'=>'', 'class'=>'form-control', 'readonly'=>'readonly']) !!}
        @if ($errors->has('madinah_four_nights_price_price'))
            <div class="form-control-feedback">{{ $errors->first('madinah_four_nights_price_price') }}</div>
        @endif
    </div>
    <div class="form-group form-group col-sm-6 {{ $errors->has('madinah_four_nights_price_qty') ? ' has-error' : '' }}">
        {!! Form::label('madinah_four_nights_price_qty', 'Quantity') !!}
        {!! Form::number('madinah_four_nights_price_qty', null,['placeholder'=>'', 'class'=>'form-control']) !!}
        @if ($errors->has('madinah_four_nights_price_qty'))
            <div class="form-control-feedback">{{ $errors->first('madinah_four_nights_price_qty') }}</div>
        @endif
    </div>
</div>

<div class="row feature-div hide" id="madinah_extra_bed_price_div">
    <div class="form-group form-group col-sm-6 {{ $errors->has('madinah_extra_bed_price_price') ? ' has-error' : '' }}">
        {!! Form::label('madinah_extra_bed_price_price', 'Extra Bed') !!}
        {!! Form::text('madinah_extra_bed_price_price', null,['placeholder'=>'', 'class'=>'form-control', 'readonly'=>'readonly']) !!}
        @if ($errors->has('madinah_extra_bed_price_price'))
            <div class="form-control-feedback">{{ $errors->first('madinah_extra_bed_price_price') }}</div>
        @endif
    </div>
    <div class="form-group form-group col-sm-6 {{ $errors->has('madinah_extra_bed_price_qty') ? ' has-error' : '' }}">
        {!! Form::label('madinah_extra_bed_price_qty', 'Quantity') !!}
        {!! Form::number('madinah_extra_bed_price_qty', null,['placeholder'=>'', 'class'=>'form-control']) !!}
        @if ($errors->has('madinah_extra_bed_price_qty'))
            <div class="form-control-feedback">{{ $errors->first('madinah_extra_bed_price_qty') }}</div>
        @endif
    </div>
</div>