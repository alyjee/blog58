<div class="row">
	<div class="col-xs-12 text-left">
		<h5>PERSONAL DETAILS</h5>
	</div>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Surname</th>
            <th>Given Name</th>
            <th>Middle Name</th>
            <th>DoB</th>
            <th>Passport#</th>
            <th>Passport Issue Date</th>
            <th>Passport Expiry Date</th>
        </tr>
    </thead>
    <tbody>
        @foreach($personalDetails as $i => $pd)
            <tr>
                <td>{{ ++$i }}</td>        
                <td>{{ $pd->sur_name }}</td>        
                <td>{{ $pd->given_name }}</td>        
                <td>{{ $pd->middle_name }}</td>        
                <td>{{ $pd->dob }}</td>        
                <td>{{ $pd->passport_num }}</td>        
                <td>{{ date('j F, Y', strtotime($pd->passport_issue_date)) }}</td>        
                <td>{{ date('j F, Y', strtotime($pd->passport_expiry_date)) }}</td>        
                <td>{{ $pd->sur_name }}</td>        
            </tr>
        @endforeach
    </tbody>
</table>