@if(!isset($proposedForm) || $proposedForm->itineraries()->count() == 0)
    <div class="col-sm-6 iternary-holder">
        @include('partials/umrah/hotel_detail_attributes')
    </div>
@else
    @foreach($proposedForm->itineraries()->get() as $itinerary)
        <div class="col-sm-6 iternary-holder">
            @include('partials/umrah/hotel_detail_attributes', $itinerary->toArray())
            <?php
            	$prefix = str_replace('-', '', $itinerary->iternary_from_date);
            ?>
            @foreach($itinerary->features()->get() as $feature)
            	<div class="row" >
	            	@include('partials/umrah/pricing_feature', ['inputName'=>'features['.$prefix.'][feature_name][]', 'type'=>'text', 'readonly'=>'readonly', 'inputLabel'=>'Feature', 'inputValue'=>$feature->name, 'inputClass'=>'form-control dynamic-pf-input'])

	            	@include('partials/umrah/pricing_feature', ['inputName'=>'features['.$prefix.'][feature_price][]', 'type'=>'text', 'readonly'=>'readonly', 'inputLabel'=>'Price/Weekend', 'inputValue'=>$feature->weekday_price.'/'.$feature->weekend_price, 'inputClass'=>'form-control dynamic-pf-input'])

	            	@include('partials/umrah/pricing_feature', ['inputName'=>'features['.$prefix.'][feature_weekday_price][]', 'type'=>'hidden', 'readonly'=>'readonly', 'inputLabel'=>'Price/Weekend', 'inputValue'=>$feature->weekday_price, 'inputClass'=>'form-control dynamic-pf-input'])

	            	@include('partials/umrah/pricing_feature', ['inputName'=>'features['.$prefix.'][feature_weekend_price][]', 'type'=>'hidden', 'readonly'=>'readonly', 'inputLabel'=>'Price/Weekend', 'inputValue'=>$feature->weekend_price, 'inputClass'=>'form-control dynamic-pf-input'])

	            	@include('partials/umrah/pricing_feature', ['inputName'=>'features['.$prefix.'][feature_qty][]', 'type'=>'text', 'readonly'=>'', 'inputLabel'=>'Quantity', 'inputValue'=>$feature->qty, 'inputClass'=>'form-control pricing-input dynamic-pf-input'])
            	</div>
            @endforeach
        </div>
    @endforeach
@endif