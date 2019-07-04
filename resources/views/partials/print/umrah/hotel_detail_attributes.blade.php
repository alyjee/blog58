<p><b>City: </b> {{ $iternary_city }}</p>

<div class="row">
    <div class="col-sm-6">
        <p><b>From: </b> {{ $iternary_from_date }}</p>
    </div>

    <div class="col-sm-6">
        <p><b>To: </b> {{ $iternary_to_date }}</p>
    </div>
</div>

<p><b>Nights in City: </b> {{ $iternary_hotel_nights }}</p>

<p><b>Hotel: </b> {{ $iternary_hotel }}</p>

<p><b>Category: </b> {{ $iternary_hotel_category }}</p>

<p><b>Haram Distance: </b> {{ $iternary_hotel_distance_from_haram }}</p>

<p><b>Meal Plan: </b> {{ $iternary_hotel_meal_plan }}</p>

<div class="row makkah-feature-div {{$featureclass}} iternary_double_div">
    <div class="form-group form-group col-sm-6 {{ $errors->has('iternary_double_price') ? ' has-error' : '' }}">
        {!! Form::label('iternary_double_price', 'Double') !!}
        {!! Form::text('iternary_double_price[]', (isset($iternary_double_price)) ? $iternary_double_price : null,['placeholder'=>'', 'class'=>'form-control iternary_double_price', 'readonly'=>'readonly']) !!}
        @if ($errors->has('iternary_double_price'))
            <div class="form-control-feedback">{{ $errors->first('iternary_double_price') }}</div>
        @endif
    </div>
    <div class="form-group form-group col-sm-6 {{ $errors->has('iternary_double_qty') ? ' has-error' : '' }}">
        {!! Form::label('iternary_double_qty', 'Quantity') !!}
        {!! Form::number('iternary_double_qty[]', (isset($iternary_double_qty)) ? $iternary_double_qty : null,['placeholder'=>'', 'class'=>'form-control pricing-input']) !!}
        @if ($errors->has('iternary_double_qty'))
            <div class="form-control-feedback">{{ $errors->first('iternary_double_qty') }}</div>
        @endif
    </div>
</div>


<div class="row makkah-feature-div {{$featureclass}} iternary_triple_div">
    <div class="form-group form-group col-sm-6 {{ $errors->has('iternary_triple_price') ? ' has-error' : '' }}">
        {!! Form::label('iternary_triple_price', 'Triple') !!}
        {!! Form::text('iternary_triple_price[]', (isset($iternary_triple_price)) ? $iternary_triple_price : null,['placeholder'=>'', 'class'=>'form-control iternary_triple_price', 'readonly'=>'readonly']) !!}
        @if ($errors->has('iternary_triple_price'))
            <div class="form-control-feedback">{{ $errors->first('iternary_triple_price') }}</div>
        @endif
    </div>
    <div class="form-group form-group col-sm-6 {{ $errors->has('iternary_triple_qty') ? ' has-error' : '' }}">
        {!! Form::label('iternary_triple_qty', 'Quantity') !!}
        {!! Form::number('iternary_triple_qty[]', (isset($iternary_triple_qty)) ? $iternary_triple_qty : null,['placeholder'=>'', 'class'=>'form-control pricing-input']) !!}
        @if ($errors->has('iternary_triple_qty'))
            <div class="form-control-feedback">{{ $errors->first('iternary_triple_qty') }}</div>
        @endif
    </div>
</div>


<div class="row makkah-feature-div {{$featureclass}} iternary_quad_div">
    <div class="form-group form-group col-sm-6 {{ $errors->has('iternary_quad_price') ? ' has-error' : '' }}">
        {!! Form::label('iternary_quad_price', 'Quad') !!}
        {!! Form::text('iternary_quad_price[]', (isset($iternary_quad_price)) ? $iternary_quad_price : null,['placeholder'=>'', 'class'=>'form-control iternary_quad_price', 'readonly'=>'readonly']) !!}
        @if ($errors->has('iternary_quad_price'))
            <div class="form-control-feedback">{{ $errors->first('iternary_quad_price') }}</div>
        @endif
    </div>
    <div class="form-group form-group col-sm-6 {{ $errors->has('iternary_quad_qty') ? ' has-error' : '' }}">
        {!! Form::label('iternary_quad_qty', 'Quantity') !!}
        {!! Form::number('iternary_quad_qty[]', (isset($iternary_quad_qty)) ? $iternary_quad_qty : null,['placeholder'=>'', 'class'=>'form-control pricing-input']) !!}
        @if ($errors->has('iternary_quad_qty'))
            <div class="form-control-feedback">{{ $errors->first('iternary_quad_qty') }}</div>
        @endif
    </div>
</div>


<div class="row makkah-feature-div {{$featureclass}} iternary_quint_div">
    <div class="form-group form-group col-sm-6 {{ $errors->has('iternary_quint_price') ? ' has-error' : '' }}">
        {!! Form::label('iternary_quint_price', 'Quint') !!}
        {!! Form::text('iternary_quint_price[]', (isset($iternary_quint_price)) ? $iternary_quint_price : null,['placeholder'=>'', 'class'=>'form-control iternary_quint_price', 'readonly'=>'readonly']) !!}
        @if ($errors->has('iternary_quint_price'))
            <div class="form-control-feedback">{{ $errors->first('iternary_quint_price') }}</div>
        @endif
    </div>
    <div class="form-group form-group col-sm-6 {{ $errors->has('iternary_quint_qty') ? ' has-error' : '' }}">
        {!! Form::label('iternary_quint_qty', 'Quantity') !!}
        {!! Form::number('iternary_quint_qty[]', (isset($iternary_quint_qty)) ? $iternary_quint_qty : null,['placeholder'=>'', 'class'=>'form-control pricing-input']) !!}
        @if ($errors->has('iternary_quint_qty'))
            <div class="form-control-feedback">{{ $errors->first('iternary_quint_qty') }}</div>
        @endif
    </div>
</div>

<div class="row makkah-feature-div {{$featureclass}} iternary_sharing_div">
    <div class="form-group form-group col-sm-6 {{ $errors->has('iternary_sharing_price') ? ' has-error' : '' }}">
        {!! Form::label('iternary_sharing_price', 'Sharing') !!}
        {!! Form::text('iternary_sharing_price[]', (isset($iternary_sharing_price)) ? $iternary_sharing_price : null,['placeholder'=>'', 'class'=>'form-control iternary_sharing_price', 'readonly'=>'readonly']) !!}
        @if ($errors->has('iternary_sharing_price'))
            <div class="form-control-feedback">{{ $errors->first('iternary_sharing_price') }}</div>
        @endif
    </div>
    <div class="form-group form-group col-sm-6 {{ $errors->has('iternary_sharing_qty') ? ' has-error' : '' }}">
        {!! Form::label('iternary_sharing_qty', 'Quantity') !!}
        {!! Form::number('iternary_sharing_qty[]', (isset($iternary_sharing_qty)) ? $iternary_sharing_qty : null,['placeholder'=>'', 'class'=>'form-control pricing-input']) !!}
        @if ($errors->has('iternary_sharing_qty'))
            <div class="form-control-feedback">{{ $errors->first('iternary_sharing_qty') }}</div>
        @endif
    </div>
</div>

<div class="row makkah-feature-div {{$featureclass}} iternary_weekend_price_div">
    <div class="form-group form-group col-sm-6 {{ $errors->has('iternary_weekend_price_price') ? ' has-error' : '' }}">
        {!! Form::label('iternary_weekend_price_price', 'Weekend Price') !!}
        {!! Form::text('iternary_weekend_price_price[]', (isset($iternary_weekend_price_price)) ? $iternary_weekend_price_price : null,['placeholder'=>'', 'class'=>'form-control pricing-input iternary_weekend_price_price', 'readonly'=>'readonly']) !!}
        @if ($errors->has('iternary_weekend_price_price'))
            <div class="form-control-feedback">{{ $errors->first('iternary_weekend_price_price') }}</div>
        @endif
    </div>
    <div class="form-group form-group col-sm-6 {{ $errors->has('iternary_weekend_price_qty') ? ' has-error' : '' }}">
        {!! Form::label('iternary_weekend_price_qty', 'Quantity') !!}
        {!! Form::number('iternary_weekend_price_qty[]', (isset($iternary_weekend_price_qty)) ? $iternary_weekend_price_qty : null,['placeholder'=>'', 'class'=>'form-control pricing-input']) !!}
        @if ($errors->has('iternary_weekend_price_qty'))
            <div class="form-control-feedback">{{ $errors->first('iternary_weekend_price_qty') }}</div>
        @endif
    </div>
</div>

<div class="row makkah-feature-div {{$featureclass}} iternary_haram_view_price_div">
    <div class="form-group form-group col-sm-6 {{ $errors->has('iternary_haram_view_price_price') ? ' has-error' : '' }}">
        {!! Form::label('iternary_haram_view_price_price', 'Haram View Price') !!}
        {!! Form::text('iternary_haram_view_price_price[]', (isset($iternary_haram_view_price_price)) ? $iternary_haram_view_price_price : null,['placeholder'=>'', 'class'=>'form-control iternary_haram_view_price_price', 'readonly'=>'readonly']) !!}
        @if ($errors->has('iternary_haram_view_price_price'))
            <div class="form-control-feedback">{{ $errors->first('iternary_haram_view_price_price') }}</div>
        @endif
    </div>
    <div class="form-group form-group col-sm-6 {{ $errors->has('iternary_haram_view_price_qty') ? ' has-error' : '' }}">
        {!! Form::label('iternary_haram_view_price_qty', 'Quantity') !!}
        {!! Form::number('iternary_haram_view_price_qty[]', (isset($iternary_haram_view_price_qty)) ? $iternary_haram_view_price_qty : null,['placeholder'=>'', 'class'=>'form-control pricing-input']) !!}
        @if ($errors->has('iternary_haram_view_price_qty'))
            <div class="form-control-feedback">{{ $errors->first('iternary_haram_view_price_qty') }}</div>
        @endif
    </div>
</div>

<div class="row makkah-feature-div {{$featureclass}} iternary_full_board_per_pax_per_day_div">
    <div class="form-group form-group col-sm-6 {{ $errors->has('iternary_full_board_per_pax_per_day_price') ? ' has-error' : '' }}">
        {!! Form::label('iternary_full_board_per_pax_per_day_price', 'Full Board/pax/Day') !!}
        {!! Form::text('iternary_full_board_per_pax_per_day_price[]', (isset($iternary_full_board_per_pax_per_day_price)) ? $iternary_full_board_per_pax_per_day_price : null,['placeholder'=>'', 'class'=>'form-control iternary_full_board_per_pax_per_day_price', 'readonly'=>'readonly']) !!}
        @if ($errors->has('iternary_full_board_per_pax_per_day_price'))
            <div class="form-control-feedback">{{ $errors->first('iternary_full_board_per_pax_per_day_price') }}</div>
        @endif
    </div>
    <div class="form-group form-group col-sm-6 {{ $errors->has('iternary_full_board_per_pax_per_day_qty') ? ' has-error' : '' }}">
        {!! Form::label('iternary_full_board_per_pax_per_day_qty', 'Quantity') !!}
        {!! Form::number('iternary_full_board_per_pax_per_day_qty[]', (isset($iternary_full_board_per_pax_per_day_qty)) ? $iternary_full_board_per_pax_per_day_qty : null,['placeholder'=>'', 'class'=>'form-control pricing-input']) !!}
        @if ($errors->has('iternary_full_board_per_pax_per_day_qty'))
            <div class="form-control-feedback">{{ $errors->first('iternary_full_board_per_pax_per_day_qty') }}</div>
        @endif
    </div>
</div>

<div class="row makkah-feature-div {{$featureclass}} iternary_four_nights_price_div">
    <div class="form-group form-group col-sm-6 {{ $errors->has('iternary_four_nights_price_price') ? ' has-error' : '' }}">
        {!! Form::label('iternary_four_nights_price_price', 'Four Nights') !!}
        {!! Form::text('iternary_four_nights_price_price[]', (isset($iternary_four_nights_price_price)) ? $iternary_four_nights_price_price : null,['placeholder'=>'', 'class'=>'form-control iternary_four_nights_price_price', 'readonly'=>'readonly']) !!}
        @if ($errors->has('iternary_four_nights_price_price'))
            <div class="form-control-feedback">{{ $errors->first('iternary_four_nights_price_price') }}</div>
        @endif
    </div>
    <div class="form-group form-group col-sm-6 {{ $errors->has('iternary_four_nights_price_qty') ? ' has-error' : '' }}">
        {!! Form::label('iternary_four_nights_price_qty', 'Quantity') !!}
        {!! Form::number('iternary_four_nights_price_qty[]', (isset($iternary_four_nights_price_qty)) ? $iternary_four_nights_price_qty : null,['placeholder'=>'', 'class'=>'form-control pricing-input']) !!}
        @if ($errors->has('iternary_four_nights_price_qty'))
            <div class="form-control-feedback">{{ $errors->first('iternary_four_nights_price_qty') }}</div>
        @endif
    </div>
</div>

<div class="row makkah-feature-div {{$featureclass}} iternary_extra_bed_price_div">
    <div class="form-group form-group col-sm-6 {{ $errors->has('iternary_extra_bed_price_price') ? ' has-error' : '' }}">
        {!! Form::label('iternary_extra_bed_price_price', 'Extra Bed') !!}
        {!! Form::text('iternary_extra_bed_price_price[]', (isset($iternary_extra_bed_price_price)) ? $iternary_extra_bed_price_price : null,['placeholder'=>'', 'class'=>'form-control iternary_extra_bed_price_price', 'readonly'=>'readonly']) !!}
        @if ($errors->has('iternary_extra_bed_price_price'))
            <div class="form-control-feedback">{{ $errors->first('iternary_extra_bed_price_price') }}</div>
        @endif
    </div>
    <div class="form-group form-group col-sm-6 {{ $errors->has('iternary_extra_bed_price_qty') ? ' has-error' : '' }}">
        {!! Form::label('iternary_extra_bed_price_qty', 'Quantity') !!}
        {!! Form::number('iternary_extra_bed_price_qty[]', (isset($iternary_extra_bed_price_qty)) ? $iternary_extra_bed_price_qty : null,['placeholder'=>'', 'class'=>'form-control pricing-input']) !!}
        @if ($errors->has('iternary_extra_bed_price_qty'))
            <div class="form-control-feedback">{{ $errors->first('iternary_extra_bed_price_qty') }}</div>
        @endif
    </div>
</div>