<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::latest()->where('deleted', 0)->paginate(5);
        return view('', compact('orders'));
    }

    public function edit($id){
        $order = Order::find($id);
        $orderItem = OrderItem::all()->where('orderId', $order->id);
        return view('', compact('order', 'orderItem'));
    }

    public function update($id, Request $request){
        Order::find($id)->update([]);

        OrderItem::where('orderId', $id)->update([

        ]);
        return redirect()->route('admin.orders.index');
    }

    public function delete($id)
    {
        Order::find($id)->update([
            'deleted' => 1
        ]);

        OrderItem::where('orderId', $id)->updated([
            'deleted' => 1
        ]);

        return redirect()->route('products.index');
    }
}
