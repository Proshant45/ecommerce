<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart()
    {
        return view('frontend.cart');
    }
    public function addToCart($slug)
    {
        return redirect()->back()->with('success', 'Product added to cart');
    }

    public function updateCart(Request $request)
    {
        return redirect()->back()->with('success', 'Cart updated');
    }

    public function removeCart($slug)
    {
        return redirect()->back()->with('success', 'Product removed from cart');
    }


}
