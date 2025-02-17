<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Session;

    class CheckOutController extends Controller
    {
        public function create(Request $request)
        {
            if (Auth::user()) {
                $cart = Auth::user()->cart;
                $cart_items = $cart->items;

            } else {
                Session::flash('message', 'Please register to checkout');
                return view('auth.register');
            }

            return view('frontend.checkout', ['cart_items' => $cart_items]);

        }


        public function store(Request $request)
        {
//            dd($request->all());
            $cart = Auth::user()->cart;
            $cart_items = $cart->items;
            dd($cart_items);


        }


    }
