<?php

    namespace App\Http\Controllers;

    use App\Models\Cart;
    use App\Models\CartItem;
    use App\Models\Product;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;

    class CartController extends Controller
    {
        public static function sessionCart()
        {
            if (!Auth::check()) {
                $cartItems = collect(session()->get('cart_items', []));
                $cart_items = $cartItems->map(function ($item) {
                    $cartItem = new CartItem;
                    $cartItem->product = Product::find($item['product_id']);
                    $cartItem->quantity = $item['quantity'];

                    return $cartItem;

                });

                return $cart_items;
            }
        }


        public function cart()
        {


            if (!Auth::check()) {

                $cartItems = collect(session()->get('cart_items', []));
                $cart_items = $cartItems->map(function ($item) {
                    $cartItem = new CartItem;
                    $cartItem->product = Product::find($item['product_id']);
                    $cartItem->quantity = $item['quantity'];

                    return $cartItem;
                });

                return view('frontend.cart', ['cart_items' => $cart_items]);
            }

            $cart = Cart::firstOrCreate([
                'user_id' => Auth::id(),
            ]);

            $cart_items = $cart->items;


            return view('frontend.cart', ['cart_items' => $cart_items]);
        }

        public function checkout(Request $request)
        {
            dd($request->all());

            return view('frontend.checkout');
        }

        public function addToCart(Request $request, $id)
        {
            $product = Product::findOrFail($id);
            $quantity = $request->quantity ?? 1;

            if (!Auth::check()) {
                $cartItems = session()->get('cart_items', []);

                if (isset($cartItems[$id])) {
                    $cartItems[$id]['quantity'] += $quantity;
                } else {
                    $cartItems[$id] = [
                        'name' => $product->name,
                        'product_id' => $id,
                        'quantity' => $quantity,
                        'price' => $product->price,
                    ];
                }

                session()->put('cart_items', $cartItems);

                return redirect()->back()->with('success', 'Product added to cart');
            }

            $cart = Cart::firstOrCreate([
                'user_id' => Auth::id(),
            ]);

            $cartItem = $cart->items()->where('product_id', $id)->first();

            if ($cartItem) {
                $cartItem->quantity += $quantity;
                $cartItem->save();
            } else {
                $cartItem = new CartItem([
                    'product_id' => $id,
                    'quantity' => $quantity,
                ]);
                $cart->items()->save($cartItem);
            }

            return redirect()->back()->with('success', 'Product added to cart');
        }

        public function updateCart(Request $request)
        {
            dd($request->all());
            if (!Auth::check()) {
                $cartItems = session()->get('cart_items', []);


//                "name" => "Miss Krystel Cartwright"
//                "product_id" => "2"
//                 "quantity" => 10
//                "price" => "165.69"

                foreach ($cartItems as $key => $item) {
                    $cartItems[$key]['quantity'] = $request->new_quantity[$item['product_id']];
                    $cartItems[$key]['price'] = $item['price'] * $request->new_quantity[$item['product_id']];

                }

                session()->put('cart_items', $cartItems);
                return redirect()->back()->with('success', 'Cart updated');
            }

            return redirect()->back();
        }

        public function applyCoupon(Request $request)
        {
            dd($request->all());

            return redirect()->back()->with('success', 'Coupon applied');

        }

        public function removeFromCart($id)
        {
            if (!Auth::check()) {
                $cartItems = session()->get('cart_items', []);
                foreach ($cartItems as $key => $item) {
                    if ($key == $id) {
                        unset($cartItems[$key]);
                        session()->put('cart_items', $cartItems);
                        return redirect()->back()->with('success', 'Product removed from cart');

                    }
                }
            }

            CartItem::where('id', $id)->delete();

            return redirect()->back()->with('success', 'Product removed from cart');
        }

    }
