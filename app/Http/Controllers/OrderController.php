<?php

    namespace App\Http\Controllers;

    use App\Models\Order;
    use Illuminate\Http\Request;

    class OrderController extends Controller
    {
        /**
         * Display a listing of the resource.
         */
        public function index()
        {

            $orders = auth()->user()->orders;

            return view('frontend.order', ['orders' => $orders]);
        }

        public function successfullyPlaced()
        {
            return view('frontend.order_successfull');
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
