<x-frontend.layout>
    <div class="container mt-5 pb-5">
        <h2 class="mb-4">Order Details</h2>
        <div class="card mb-4">
            <div class="card-header">
                Order Information
            </div>
            <div class="card-body d-flex justify-content-between">
                <div>
                    <p><strong>Order ID:</strong> #{{$order->id}}</p>
                    <p><strong>Order Date:</strong> {{$order->created_at}}</p>
                    <p><strong>Status:</strong> {{$order->status}}</p>
                    <p><strong>Total Price:</strong>{{$order->total_price}}</p>
                </div>
                <div>
                    <p><strong>Shipping Address</strong></p>
                    <p><strong>Address:</strong> #{{$order->shipping_address['address']}}</p>
                    <p><strong>City:</strong> {{$order->shipping_address['city']}}</p>
                    <p><strong>Zip:</strong> {{$order->shipping_address['zip']}}</p>
                </div>

            </div>

        </div>


        <div class="card">
            <div class="card-header">
                Order Items
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead class="thead-light">
                    <tr>
                        <th>Product Image</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($order->items as $orderItem)
                        <tr>
                            <td><img src="{{$orderItem->product_name}}/images/cart/1.jpg" alt="Product"
                                     class="img-fluid"
                                     width="50"></td>
                            <td>{{$orderItem->product_name}}</td>
                            <td>{{$orderItem->quantity}}</td>
                            <td>{{$orderItem->price}}</td>
                            <td>{{$orderItem->price * $orderItem->quantity}}</td>

                        </tr>
                    @endforeach
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Shipping</td>
                        <td>{{$order->shipping_price}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Sub Total</td>
                        <td>{{$order->total_price}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><strong> Total</strong></td>
                        <td>
                            <strong>{{$order->total_price + $order->shipping_price}}</strong>
                        </td>
                    </tr>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
    <x-frontend.news-letter/>
</x-frontend.layout>