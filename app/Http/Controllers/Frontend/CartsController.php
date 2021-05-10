<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartsController extends Controller
{
    public function index()
    {
        return view('frontend.pages.cart');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
           'product_id' => 'required',
        ]);

        if (Auth::check()) {
            $cart = Cart::where('user_id', Auth::id())
                ->where('product_id', $request->product_id)
                ->first();
        } else {
            $cart = Cart::where('ip_address', request()->ip())
                ->where('product_id', $request->product_id)
                ->first();
        }

        if (!is_null($cart)) {
            $cart->increment('product_quantity');
        } else {
            $cart = new Cart();

            if (Auth::check()) {
                $cart->user_id = Auth::id();
            }

            $cart->ip_address = request()->ip();
            $cart->product_id = $request->product_id;

            $cart->save();
        }

        session()->flash('success', 'Product added to the cart');
        return back();
    }
}
