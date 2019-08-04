<h5 style="font-weight: bold;">{{ date('j F, Y', strtotime($iternary_from_date)) }} <i>to</i> {{ date('j F, Y', strtotime($iternary_to_date)) }} <i>stay in</i> {{ $iternary_hotel.', '.$iternary_city }} City</h5>

<p>{{ $iternary_hotel_category }}, {{ $iternary_hotel_distance_from_haram }}, {{ $iternary_hotel_meal_plan }}</p>

<table class="table table-bordered">
    <tbody>
        <tr>
            @foreach($features as $feature)
                <td>{{ $feature->qty.' * '.$feature->name }}</td>
            @endforeach
        </tr>
    </tbody>
</table>