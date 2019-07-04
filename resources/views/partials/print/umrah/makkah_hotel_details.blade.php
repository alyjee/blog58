@if(!isset($proposedForm) || $proposedForm->itineraries()->count() == 0)
    <div class="col-xs-12">
        <h1>No itineraries!</h1>
    </div>
@else
    @foreach($proposedForm->itineraries()->get() as $itinerary)
        <div class="col-xs-6 iternary-holder">
            @include('partials/print/umrah/hotel_detail_attributes', $itinerary->toArray())
        </div>
    @endforeach
@endif