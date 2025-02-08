<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cart()
    {
        if (Auth::user()) {
            $cart_items = Auth::user()->cart->items;
        }
        else
        {
            $cart_items = [];
        }

        return view('frontend.cart', ['cart_items' => $cart_items]);
    }

    public function checkout(Request $request)
    {
        dd($request->all());

        return view('frontend.checkout');
    }

    public function addToCart(Request $request, $id)
    {
        $cart = Cart::firstOrCreate([
            'user_id' => Auth::id(),
        ]);
        $product = Product::findOrFail($id);
        $quantity = $request->quantity;

        $cartItem = $cart->items()->where('product_id', $id)->first();

        if ($cartItem) {
            $cartItem->quantity += $quantity;
        } else {

            $cartItem = new CartItem([
                'product_id' => $id,
                'quantity' => $quantity,
            ]);
            $cart->items()->save($cartItem);
        }

        return redirect()->back()->with('success', 'Product added to cart!');

        $cartItem = new CartItem();
        $cartItem->product_id = $id;
        $cartItem->quantity = $request->quantity;
        $cartItem->cart_id = $cart->id;
        $cartItem->save();

        return redirect()->back()->with('Product added to cart');
    }

    public function updateCart(Request $request)
    {
        dd($request->all());

        return redirect()->back();
    }

    public function applyCoupon(Request $request)
    {
        dd($request->all());


        return redirect()->back()->with('success', 'Coupon applied');

    }

    public function removeFromCart($id)
    {   CartItem::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Product removed from cart');
    }
}
