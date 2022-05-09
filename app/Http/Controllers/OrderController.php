<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\Order;

class OrderController extends Controller
{
    public function __construct() {
        return $this->middleware('auth');
    }

    public function index() {
        $activeOrder = auth()->user()->orders()->where('completed', 0)->orderBy('dateTime', 'desc')->first();
        $allOrders = auth()->user()->orders()->orderBy('dateTime', 'desc')->paginate(8);
        return view('order', compact('activeOrder', 'allOrders'));
    }

    public function show(Order $order) {
        $activeOrder = $order;
        $allOrders = auth()->user()->orders()->orderBy('dateTime', 'desc')->paginate(8);
        return view('order', compact('activeOrder', 'allOrders'));
    }

    public function kitchenOrder() {
        if (auth()->user()->role == 'customer')
            abort(403, 'This route is only meant for restaurant staffs.');

        $activeOrders = Order::where('completed', 0)->orderBy('dateTime', 'desc')->paginate(8);
        $firstOrder = $activeOrders->first();
        return view('kitchenOrder', compact('firstOrder', 'activeOrders'));
    }

    public function specificKitchenOrder(Order $order) {
        if (auth()->user()->role == 'customer')
            abort(403, 'This route is only meant for restaurant staffs.');

        $activeOrders = Order::where('completed', 0)->orderBy('dateTime', 'desc')->paginate(8);
        $firstOrder = $order;
        return view('kitchenOrder', compact('firstOrder', 'activeOrders'));
    }

    public function orderStatusUpdate(CartItem $orderItem) {
        if (auth()->user()->role == 'customer')
            abort(403, 'This route is only meant for restaurant staffs.');

        $orderItem->fulfilled = $orderItem->fulfilled ? false : true;
        $orderItem->save();

        $cartItems = CartItem::where('order_id', $orderItem->order_id)->paginate(8);
        foreach ($cartItems as $item) {
            if (!$item->fulfilled)
                return redirect()->route('kitchenOrder');
        }
        $orderItem->order->completed = true;
        $orderItem->push();
        return redirect()->route('kitchenOrder');
    }

    public function previousOrder() {
        if (auth()->user()->role == 'customer')
            abort(403, 'This route is only meant for restaurant staffs.');

        $previousOrders = Order::where('completed', 1)->orderBy('dateTime', 'desc')->paginate(8);
        return view('previousOrder', compact('previousOrders'));
    }
}
