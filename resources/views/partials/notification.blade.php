<li>
@if(Auth::guard('admin')->check())
	<a href="{{ route('dashboard.orders.detail', ['id'=>$notification->data['order_id']]) }}">
@elseif(Auth::guard('web')->check())
	<a href="{{ route('r_dashboard.orders.detail', ['id'=>$notification->data['order_id']]) }}">
@endif
    <div>
        <p><strong>Order {{ $notification->data['order_id'] }}</strong> <span class="pull-right text-muted">Received New Order</span> </p>
        <div class="progress progress-striped active">
            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%"> <span class="sr-only">New Order</span> </div>
        </div>
    </div>
</a>
</li>
<li class="divider"></li>