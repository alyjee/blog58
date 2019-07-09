<h5 style="font-weight: bold;">{{ date('j F, Y', strtotime($iternary_from_date)) }} <i>to</i> {{ date('j F, Y', strtotime($iternary_to_date)) }} <i>stay in</i> {{ $iternary_hotel.', '.$iternary_city }} City</h5>

<p>{{ $iternary_hotel_category }}, {{ $iternary_hotel_distance_from_haram }}, {{ $iternary_hotel_meal_plan }}</p>

<table class="table table-bordered">
    <thead>
        <tr>
            <th class="{{ (isset($iternary_double_qty) && $iternary_double_qty==0) ? 'hide' : '' }}">
                Double
            </th>

            <th class="{{ (isset($iternary_triple_qty) && $iternary_triple_qty==0) ? 'hide' : '' }}">
                Triple
            </th>

            <th class="{{ (isset($iternary_quad_qty) && $iternary_quad_qty==0) ? 'hide' : '' }}">
                Quad
            </th>

            <th class="{{ (isset($iternary_quint_qty) && $iternary_quint_qty==0) ? 'hide' : '' }}">
                Quint
            </th>

            <th class="{{ (isset($iternary_sharing_qty) && $iternary_sharing_qty==0) ? 'hide' : '' }}">
                Sharing
            </th>

            <th class="{{ (isset($iternary_weekend_price_qty) && $iternary_weekend_price_qty==0) ? 'hide' : '' }}">
                Weekend/s
            </th>

            <th class="{{ (isset($iternary_haram_view_price_qty) && $iternary_haram_view_price_qty==0) ? 'hide' : '' }}">
                Haram View/s
            </th>

            <th class="{{ (isset($iternary_full_board_per_pax_per_day_qty) && $iternary_full_board_per_pax_per_day_qty==0) ? 'hide' : '' }}">
                Full Board/pax/day
            </th>

            <th class="{{ (isset($iternary_four_nights_price_qty) && $iternary_four_nights_price_qty==0) ? 'hide' : '' }}">
                Four Nights
            </th>

            <th class="{{ (isset($iternary_extra_bed_price_qty) && $iternary_extra_bed_price_qty==0) ? 'hide' : '' }}">
                Extra Bed/s
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="{{ (isset($iternary_double_qty) && $iternary_double_qty==0) ? 'hide' : '' }}">
                {{ $iternary_double_price }} * {{ $iternary_double_qty }}
            </td>

            <td class="{{ (isset($iternary_triple_qty) && $iternary_triple_qty==0) ? 'hide' : '' }}">
                {{ $iternary_triple_price }} * {{ $iternary_triple_qty }}
            </td>

            <td class="{{ (isset($iternary_quad_qty) && $iternary_quad_qty==0) ? 'hide' : '' }}">
                {{ $iternary_quad_price }} * {{ $iternary_quad_qty }}
            </td>

            <td class="{{ (isset($iternary_quint_qty) && $iternary_quint_qty==0) ? 'hide' : '' }}">
                {{ $iternary_quint_price }} * {{ $iternary_quint_qty }}
            </td>

            <td class="{{ (isset($iternary_sharing_qty) && $iternary_sharing_qty==0) ? 'hide' : '' }}">
                {{ $iternary_sharing_price }} * {{ $iternary_sharing_qty }}
            </td>

            <td class="{{ (isset($iternary_weekend_price_qty) && $iternary_weekend_price_qty==0) ? 'hide' : '' }}">
                {{ $iternary_weekend_price_price }} * {{ $iternary_weekend_price_qty }}
            </td>

            <td class="{{ (isset($iternary_haram_view_price_qty) && $iternary_haram_view_price_qty==0) ? 'hide' : '' }}">
                {{ $iternary_haram_view_price_price }} * {{ $iternary_haram_view_price_qty }}
            </td>

            <td class="{{ (isset($iternary_full_board_per_pax_per_day_qty) && $iternary_full_board_per_pax_per_day_qty==0) ? 'hide' : '' }}">
                {{ $iternary_full_board_per_pax_per_day_price }} * {{ $iternary_full_board_per_pax_per_day_qty }}
            </td>

            <td class="{{ (isset($iternary_four_nights_price_qty) && $iternary_four_nights_price_qty==0) ? 'hide' : '' }}">
                {{ $iternary_four_nights_price_price }} * {{ $iternary_four_nights_price_qty }}
            </td>

            <td class="{{ (isset($iternary_extra_bed_price_qty) && $iternary_extra_bed_price_qty==0) ? 'hide' : '' }}">
                {{ $iternary_extra_bed_price_price }} * {{ $iternary_extra_bed_price_qty }}
            </td>
        </tr>
    </tbody>
</table>