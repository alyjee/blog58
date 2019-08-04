@if(!isset($proposedForm) || $proposedForm->itineraries()->count() == 0)
    <div class="col-xs-12">
        <h1>No itineraries!</h1>
    </div>
@else
    @foreach($proposedForm->itineraries()->get() as $itinerary)
        <div class="col-xs-12 iternary-holder">
        	<?php
                $hotel = $itinerary->hotel()->first()->name;
        		$features = $itinerary->features()->get();
        		$hotel_catehory = $itinerary->category()->first()->name;
        		$itinerary = $itinerary->toArray();
        		$itinerary['iternary_hotel'] = $hotel;
                $itinerary['iternary_hotel_category'] = $hotel_catehory;
        		$itinerary['features'] = $features;
        	?>
            @include('partials/print/umrah/hotel_detail_attributes', $itinerary)
        </div>
    @endforeach
@endif