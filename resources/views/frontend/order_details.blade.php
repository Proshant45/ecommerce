<x-frontend.layout>
    <div class="container mt-5 pb-5">
        <h2 class="mb-4">Order Details</h2>
        <div class="card mb-4">
            <div class="card-header">
                Order Information
            </div>
            <div class="card-body">
                <p><strong>Order ID:</strong> #{{$order->id}}</p>
                <p><strong>Order Date:</strong> {{$order->created_at}}</p>
                <p><strong>Status:</strong> {{$order->status}}</p>
                <p><strong>Total Price:</strong>{{$order->total_price}}</p>
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

                    <!-- Additional order items can be added here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <x-frontend.news-letter/>
</x-frontend.layout>