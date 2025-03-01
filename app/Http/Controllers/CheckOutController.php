<?php

    namespace App\Http\Controllers;

    use App\Models\Address;
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

        public function checkAddresses($billingAddress, $shippingAddress)
        {
            // Check if billing address exists
            $existingBillingAddress = Address::where([
                'user_id' => auth()->id(),
                'type' => 'billing',
                'address' => $billingAddress['billingAddress'],
                'city' => $billingAddress['billingCity'],
                'zip' => $billingAddress['billingZip'],
                'country' => $billingAddress['billingCountry'],
            ])->first();

            // Check if shipping address exists
            $existingShippingAddress = Address::where([
                'user_id' => auth()->id(),
                'type' => 'shipping',
                'address' => $shippingAddress['shippingAddress'],
                'city' => $shippingAddress['shippingCity'],
                'zip' => $shippingAddress['shippingZip'],
                'country' => $shippingAddress['shippingCountry'],
            ])->first();

            if ($existingBillingAddress && $existingShippingAddress) {
                // Both addresses exist in database, use existing ones
                return [
                    'billing_address_id' => $existingBillingAddress->id,
                    'shipping_address_id' => $existingShippingAddress->id,
                    'addresses_exist' => true
                ];
            }

            if (!$existingBillingAddress) {
                $billingAddress = Address::create([
                    'user_id' => auth()->id(),
                    'type' => 'billing',
                    'address' => $billingAddress['billingAddress'],
                    'city' => $billingAddress['billingCity'],
                    'zip' => $billingAddress['billingZip'],
                    'country' => $billingAddress['billingCountry'],
                ]);
            }
            if (!$existingShippingAddress) {
                $shippingAddress = Address::create([
                    'user_id' => auth()->id(),
                    'type' => 'shipping',
                    'address' => $shippingAddress['shippingAddress'],
                    'city' => $shippingAddress['shippingCity'],
                    'zip' => $shippingAddress['shippingZip'],
                    'country' => $shippingAddress['shippingCountry'],
                ]);
            }

            return [
                'billing_address_id' => $billingAddress->id,
                'shipping_address_id' => $shippingAddress->id,
                'addresses_exist' => false
            ];
        }


        public function store(Request $request)
        {
            $billingAddress = $request->validate([
                'paymentMethod' => 'required',
                'billingAddress' => 'required',
                'billingCity' => 'required',
                'billingCountry' => 'required',
                'billingZip' => 'required',

            ]);

            if ($request->has('ship_to_different_address')) {
                $shippingAddress = $request->validate([
                    'shippingCountry' => 'required',
                    'shippingAddress' => 'required',
                    'shippingCity' => 'required',
                    'shippingZip' => 'required',
                ]);
            } else {
                $shippingAddress = [
                    'shippingAddress' => $billingAddress['billingAddress'],
                    'shippingCountry' => $billingAddress['billingCountry'],
                    'shippingCity' => $billingAddress['billingCity'],
                    'shippingZip' => $billingAddress['billingZip'],
                ];
            }

            $addresses = $this->checkAddresses($billingAddress, $shippingAddress);


            $user_info = request()->validate([
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
            ]);

            $cart = Auth::user()->cart;
            $cart_items = $cart->items;


            $total_price = $cart->totalAmount();

            if ($request->paymentMethod == 'COD') {

                $order = Auth::user()->orders()->create([
                    'total_price' => $total_price,
                    'payment_method' => 'COD',
                    'billing_address' => Address::findOrfail($addresses['billing_address_id']),
                    'shipping_address' => Address::findOrfail($addresses['shipping_address_id']),
                    'status' => 'pending',
                    'notes' => $request->massage,
                ]);
                foreach ($cart_items as $cart_item) {
                    $cart_item->product->decrement('stock', $cart_item->quantity);
                    $price_after_discount = ($cart_item->product->price -
                            ($cart_item->product->price * (($cart_item->product->discount_rate) / 100))) * $cart_item->quantity;
                    $order_item = $order->items()->create([
                        'order_id' => $order->id,
                        'product_id' => $cart_item->product_id,
                        'quantity' => $cart_item->quantity,
                        'price' => $cart_item->product->price,
                        'total_price' => $cart_item->product->price * $cart_item->quantity,
                        'product_name' => $cart_item->product->name,
                        'product_image' => $cart_item->product->image,
                        'discount' => $price_after_discount,


                    ]);
                }
                $cart->items()->delete();

                return redirect("/order_successfull/{$order->id}");
            }

        }


    }
