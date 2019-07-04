@if(!isset($proposedForm) || $proposedForm->itineraries()->count() == 0)
    <div class="col-sm-6 iternary-holder">
        @include('partials/umrah/hotel_detail_attributes')
    </div>
@else
    @foreach($proposedForm->itineraries()->get() as $itinerary)
        <div class="col-sm-6 iternary-holder">
            @include('partials/umrah/hotel_detail_attributes', $itinerary->toArray())
        </div>
    @endforeach
@endif