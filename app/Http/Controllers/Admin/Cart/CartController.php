<?php

namespace App\Http\Controllers\Admin\Cart;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\User;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        $carts = Cart::latest()->where('deleted', 0)->paginate(5);
        return view('', compact('carts'));
    }

    public function edit($id){
        $cart = Cart::find($id);
        $user = User::where('id', $cart->userId);
        $cartItem = CartItem::where('cartId', $id);
        return view('', compact('user', 'cart', 'cartItem'));
    }

    public function update($id, Request $request){
        Cart::find($id)->update([
            ''
        ]);
        return redirect()->route('admin.cart.index');
    }

    public function delete($id){
        Cart::find($id)->updated([
            'deleted' => 1
        ]);

        return redirect()->route('admin.cart.index');
    }
}
