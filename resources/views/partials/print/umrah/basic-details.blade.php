<div class="row">
	<div class="col-xs-6 text-left">
		<p><b>Date: </b>{{ $form_creation_date }}</p>
	</div>

	<div class="col-xs-6 text-right">
		<p><b>Ref# SL/: </b>{{ $form_ref_number }}</p>
	</div>
</div>

<div class="row">
	<div class="col-sm-12">
		<p><b>DEAR Mr./Mrs./Ms. </b>{{ $proposedForm->person_name }}</p>
		
		<div class="form-group form-group">
    		<p>Great thanks for taking interest to travel with SEA LINKS TRAVEL & TOURS. Your required rates of Umrah and Tickets are mentioned below, after viewing these rates please don't hesitate to contact this office for any inquiry or further clarification.</p>
    		<p>Details as below:</p>
		</div>
	</div>
</div>

<div class="row">

	<div class="col-xs-3">
        <p><b>From Date: </b>{{ $proposedForm->from_date }}</p>
	</div>

	<div class="col-xs-3">
		<p><b>To Date: </b>{{ $proposedForm->to_date }}</p>
	</div>

    <div class="col-xs-6">
        <p><b>No. of Nights/Days: </b>{{ $proposedForm->total_days }}</p>
    </div>

</div>

<div class="row">
	<div class="col-sm-6 col-xs-6">
        <p><b>Total Passengers: </b>{{ $proposedForm->total_passengers }}</p>
	</div>

	<div class="col-sm-2 col-xs-2">
        <p><b>Adult/s: </b>{{ $proposedForm->adults }}</p>
	</div>

	<div class="col-sm-2 col-xs-2">
        <p><b>Child/s: </b>{{ $proposedForm->childs }}</p>
	</div>

	<div class="col-sm-2 col-xs-2">
        <p><b>Infant/s: </b>{{ $proposedForm->infants }}</p>
	</div>
</div>

<div class="row">
	<div class="col-sm-6 col-xs-6">
        <p><b>Package Category: </b>{{ $proposedForm->package()->first()->name }}</p>
	</div>

	<div class="col-sm-3 col-xs-3">
        <p style="text-transform: capitalize;"><b>Transport: </b>{{ $proposedForm->transport }}</p>
	</div>

</div>

@if( !empty($proposedForm->airline) )
<div class="row">
	<div class="col-sm-6 col-xs-6">
        <p><b>Airline: </b>{{ $proposedForm->airline }}</p>
	</div>

	<div class="col-sm-6 col-xs-6">
        <p><b>Flight Type: </b>{{ $proposedForm->flight_type }}</p>
	</div>
</div>
@endif
<hr />