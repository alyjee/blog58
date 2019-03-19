<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use App\Http\Requests\StoreUpdate;
// use App\HPUpdate;
use App\User;
use Auth;
// use App\Order;
// use App\FoodCategory;
// use App\Menu;
// use App\Restaurant;
// use App\Services\RestaurantService;

class DashboardController extends Controller
{
    //

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['ra_count'] = 0;
        $data['fc_count'] = 0;
        $data['m_count'] = 0;
        $data['r_count'] = 0;
        $recentOrders = [];
        $data['sum'] = 0;
        $recentOrders = [];
        return view('pages.dashboard', compact('data', 'recentOrders'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function hpUpdateView()
    {
        return view('pages.hp.update');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function hpUpdateSave(StoreUpdate $request)
    {
        HPUpdate::where('id', '>', 0)->delete();
        $hPUpdate = HPUpdate::create($request->except('_token'));
        if($hPUpdate->exists){
            return redirect()->route('dashboard.index');
        }
        return redirect()->back()->withErrors([$res['msg']])->withInput();
    }

    /**
     * Update the view for notifications.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getNotifications()
    {
        try {
            $user = User::where('id', Auth::guard('admin')->user()->id)->first();
            $notifications = $user->unreadNotifications;
            $view = '';
            if($notifications->count()>0){
                $notifications->each(function($notification) use(&$view) {
                    $view .= view('partials.notification', ['notification'=>$notification])->render();
                });
                return response()->json(['success'=>true, 'message'=>'New Notifications found.', 'data'=>['html'=>$view]]);
            } else {
                return response()->json(['success'=>false, 'message'=>'No new notifications.', 'data'=>['html'=>$view]]);
            }
        } catch (\Exception $e) {
            return response()->json(['success'=>false, 'message'=>$e->getMessage(), 'data'=>['html'=>'']]);
        }
    }

    /**
     * Show Restaurants.
     *
     * @return \Illuminate\Http\Response
     */
    public function orders()
    {
        try {
            $orders = Order::getAllOrders();
            if($orders->count() > 0){
                $orders->map(function($order){

                    $actions = '<a href="'.route('dashboard.orders.detail', ['id' => $order->id]).'"><span class="label label-warning m-l-5"><i class="fa fa-eye"></i></span></a>';
                    $order['actions'] = $actions;
                    return $order;
                });
            }
            return view('pages.restaurant.orders.index', ['orders'=>$orders->toJson()]);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors([$e->getMessage()])->withInput();
        }
        
    }

    /**
     * Show order details to restaurant admin.
     *
     * @return \Illuminate\Http\Response
     */
    public function orderDetail(Request $request, $id)
    {
        try {
            $order = Order::where('id', $id)->first();
            if($order){
                RestaurantService::markItAsReadByOrderId(Auth::guard('admin')->user()->id, $id);
                return view('pages.restaurant.orders.detail', ['order'=>$order]);
            } else {
                return redirect()->back()->withErrors(['Order not found!']);
            }
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors([$e->getMessage()]);
        }
    }
}
