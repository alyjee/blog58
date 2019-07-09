<div class="row">
    <div class="col-xs-12 text-left">
        <h5>PAYMENT DETAILS</h5>
    </div>
</div>

@if($paymentlDetails->count() > 0 )
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Pending (PKR)</th>
                <th>Received (PKR)</th>
                <th>Remaining (PKR)</th>
                <th>Receiving Date</th>
            </tr>
        </thead>
        <tbody>
        <?php $sub = 0; ?>
        @foreach($paymentlDetails as $p => $pytd)
            <tr>
                <td>{{ ++$p }}</td>
                <td>{{ $proposedForm->total_package_price_pkr - $sub }}</td>
                <td>{{ $pytd->received_amount }}</td>
                <td>{{ $proposedForm->total_package_price_pkr - $pytd->received_amount - $sub }}</td>
                <td>{{ date('j F, Y', strtotime($pytd->receiving_date)) }}</td>
            </tr>
            <?php $sub += $pytd->received_amount; ?>
        @endforeach
        </tbody>
    </table>
@endif