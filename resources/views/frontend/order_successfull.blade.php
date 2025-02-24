<x-frontend.layout>
    <div class="cart-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-success">
                        Your order has been successfully placed.
                        and your order id is #{{$order->id}}
                        view your order details <a href="/order/{{$order->id}}">here</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-frontend.news-letter/>
</x-frontend.layout>