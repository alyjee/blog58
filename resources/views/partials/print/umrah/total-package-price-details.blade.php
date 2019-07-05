<div class="row">
	<div class="col-xs-6">
        <p><b>Umrah/Person (SAR): </b>{{ $proposedForm->umrah_per_person }}</p>
	</div>
	@if( !empty($proposedForm->airline) )
		<div class="col-xs-6">
	        <p><b>Adult/s Ticket Price (PKR): </b>{{ $proposedForm->adult_ticket_price }}</p>
	        <p><b>Child/s Ticket Price (PKR): </b>{{ $proposedForm->child_ticket_price }}</p>
	        <p><b>Infant/s Ticket Price (PKR): </b>{{ $proposedForm->infant_ticket_price }}</p>
		</div>
	@endif
</div>

<div class="row">
	<div class="col-xs-6">
        <p><b>Total Umrah Package (SAR): </b>{{ $proposedForm->total_umrah_price }}</p>
	</div>

	@if( !empty($proposedForm->airline) )
		<div class="col-xs-6">
	        <p><b>Total Ticket/s Price (PKR): </b>{{ $proposedForm->total_ticket_price }}</p>
		</div>
	@endif

</div>

<div class="row">
	<div class="col-xs-6">
        <p><b>Total Package Price (SAR): </b>{{ $proposedForm->total_package_price }}</p>
        <p><b>Conversion Rate (SAR to PKR): </b>{{ $proposedForm->conversion_rate }}</p>
        <p><b>Total Package Price (PKR): </b>{{ $proposedForm->total_package_price_pkr }}</p>
	</div>

	<div class="col-xs-6">
		
	</div>
</div>

<hr />