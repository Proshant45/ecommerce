<?php

    namespace App\Http\Controllers;

    use App\Models\Order;
    use Illuminate\Http\Request;

    class OrderController extends Controller
    {

        public function show($id)
        {
            $order = auth()->user()->orders->where('id', $id)->first();

            return view('frontend.order_details', ['order' => $order]);
        }

        public function index()
        {

            $orders = auth()->user()->orders;

            return view('frontend.order', ['orders' => $orders]);
        }

        public function successfullyPlaced($id)
        {
            $order = Order::where('id', $id)->first();
            return view('frontend.order_successfull', ['order' => $order]);
        }

        public function destroy($id)
        {
            Order::where('id', $id)->update(
                [
                    'status' => 'CANCELLED',
                    'canceled_at' => now()

                ]
            );
            return redirect('/orders');
        }
    }
