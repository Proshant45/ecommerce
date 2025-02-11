<x-frontend.layout>
    <div class="cart-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="/cart" method="post">
                        @csrf
                        <table class="table-responsive cart-wrap">
                            <thead>
                            <tr>
                                <th class="images">Image</th>
                                <th class="product">Product</th>
                                <th class="ptice">Price</th>
                                <th class="quantity">Quantity</th>
                                <th class="total">Total</th>
                                <th class="remove">Remove</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $sum = 0;
                            @endphp
                            @if(session('cart_items'))
                                @php
                                    $cart_items = session('cart_items');
                                @endphp
                                @foreach($cart_items as $item)
                                    @php

                                        $total = $item['price'] * $item['quantity'];
                                        $sum += $total;

                                    @endphp
                                    <tr>
                                        <td class="images"><img src="{{asset('assets')}}/images/cart/1.jpg" alt=""></td>

                                        <td class="product"><a href="single-product.html">{{$item['name']}} </a></td>

                                        <td class="ptice">{{$item['price']}}</td>
                                        <td class="quantity cart-plus-minus">
                                            <input type="hidden" name="new_quantity[]"/>
                                            <input type="text" name="quantity" value="{{$item['quantity']}}"/>
                                        </td>
                                        <td class="total">{{$total}} TK</td>
                                        <td class="remove"><i class="fa fa-times">
                                                <a href="/cart/delete/{{$item['product_id']}}">Remove</a>
                                            </i></td>
                                    </tr>
                                @endforeach
                            @elseif(Auth::check())
                                @foreach($cart_items as $item)
                                    @php
                                        $price = $item->product->price;
                                        $total = $item->quantity * $price;
                                        $sum += $total;
                                    @endphp
                                    <tr>
                                        <td class="images"><img src="{{asset('assets')}}/images/cart/1.jpg" alt=""></td>

                                        <td class="product"><a href="single-product.html">{{$item->product->name}}</a>
                                        </td>

                                        <td class="ptice">{{$price}}</td>
                                        <td class="quantity cart-plus-minus">
                                            <input type="hidden" name="new_quantity[]"/>
                                            <input type="text" name="quantity" min="1"
                                                   value="1" value="{{$item->quantity}}"/>
                                        </td>
                                        <td class="total">{{$total}} TK</td>
                                        <td class="remove"><i class="fa fa-times">
                                                <a href="/cart/delete/{{$item->id}}">Remove</a>
                                            </i></td>
                                    </tr>
                                @endforeach
                            @endif

                            </tbody>
                        </table>
                        <div class="row mt-60">
                            <div class="col-xl-4 col-lg-5 col-md-6 ">
                                <div class="cartcupon-wrap">
                                    <ul class="d-flex">
                                        <li>
                                            <button type="submit" formaction="{{url("/cart/update")}}">Update Cart
                                            </button>
                                        </li>
                                        <li><a href="/shop">Continue Shopping</a></li>
                                    </ul>
                                    <h3>Cupon</h3>
                                    <p>Enter Your Cupon Code if You Have One</p>
                                    <div class="cupon-wrap">
                                        <input name="cupon_code" type="text" placeholder="Cupon Code">
                                        <button type="submit" formaction="{{url("/cart/coupon")}}">Apply Cupon</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 offset-xl-5 col-lg-4 offset-lg-3 col-md-6">
                                <div class="cart-total text-right">
                                    <h3>Cart Totals</h3>
                                    <ul>
                                        <li><span class="pull-left">Subtotal </span>{{$sum}} Taka</li>
                                        <li><span class="pull-left"> Total </span>{{$sum}} Taka</li>
                                    </ul>
                                    <a href="/checkout">Proceed to Checkout</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- cart-area end -->
    <x-frontend.news-letter/>
</x-frontend.layout>