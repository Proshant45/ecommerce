<x-frontend.layout>
    <div class="cart-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3>Orders</h3>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Total</th>
                            <th>Payment Method</th>
                            <th>Payment Status</th>
                            <th>Order Date</th>
                            <th>Status</th>
                            <th>Billing Address</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{$order->id}}</td>
                                <td>{{$order->total_price}}</td>
                                <td>{{$order->payment_method}}</td>
                                <td>{{$order->payment_status}}</td>
                                <td>{{$order->created_at}}</td>
                                <td>{{$order->status}}</td>
                                <td> {{$order->shipping_address['address']}},
                                    {{$order->shipping_address['city']}}</td>
                                <td><a href="/order/delete/{{$order->id}}">Cancel</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <x-frontend.news-letter/>
</x-frontend.layout>
