<x-frontend.layout>
    <div class="checkout-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="checkout-form form-style">
                        <h3>Billing Details</h3>
                        <form action="http://themepresss.com/tf/html/tohoney/checkout">
                            <div class="row">
                                <div class="col-sm-6 col-12">
                                    <p>Full Name *</p>
                                    <input type="text" name="name" value="{{auth()->user()->name}}">
                                </div>
                                <div class="col-sm-6 col-12">
                                    <p>Email Address </p>
                                    <input type="email" name="email" value="{{auth()->user()->email}}">
                                </div>
                                <div class="col-sm-6 col-12">
                                    <p>Mobile Number *</p>
                                    <input type="text" name="phone">
                                </div>
                                <div class="col-12">
                                    <p>Country </p>
                                    <input type="text" name="country">
                                </div>
                                <div class="col-12">
                                    <p>Your Address *</p>
                                    <input type="text" name="address">
                                </div>
                                <div class="col-sm-6 col-12">
                                    <p>Postcode/ZIP</p>
                                    <input type="text" name="zip">
                                </div>
                                <div class="col-sm-6 col-12">
                                    <p>Town/City *</p>
                                    <input type="text" name="city">
                                </div>
                                <div class="col-12">
                                    <input id="toggle2" type="checkbox">
                                    <label class="fontsize" for="toggle2">Ship to a different address?</label>
                                    <div class="row" id="open2">
                                        <div class="col-12">
                                            <p>Country</p>
                                            <select id="s_country">
                                                <option value="1">Select a country</option>
                                                <option value="2">bangladesh</option>
                                                <option value="3">Algeria</option>
                                                <option value="4">Afghanistan</option>
                                                <option value="5">Ghana</option>
                                                <option value="6">Albania</option>
                                                <option value="7">Bahrain</option>
                                                <option value="8">Colombia</option>
                                                <option value="9">Dominican Republic</option>
                                            </select>
                                        </div>
                                        <div class=" col-12">
                                            <p>First Name</p>
                                            <input id="s_f_name" type="text"/>
                                        </div>
                                        <div class=" col-12">
                                            <p>Last Name</p>
                                            <input id="s_l_name" type="text"/>
                                        </div>
                                        <div class="col-12">
                                            <p>Address</p>
                                            <input type="text" placeholder="Street address"/>
                                        </div>
                                        <div class="col-12">
                                            <input type="text" placeholder="Apartment, suite, unit etc. (optional)"/>
                                        </div>
                                        <div class="col-12">
                                            <p>Town / City </p>
                                            <input id="s_city" type="text" placeholder="Town / City"/>
                                        </div>
                                        <div class="col-12">
                                            <p>State / County </p>
                                            <input id="s_county" type="text"/>
                                        </div>
                                        <div class="col-12">
                                            <p>Postcode / Zip </p>
                                            <input id="s_zip" type="text" placeholder="Postcode / Zip"/>
                                        </div>
                                        <div class="col-12">
                                            <p>Email Address </p>
                                            <input id="s_email" type="email"/>
                                        </div>
                                        <div class="col-12">
                                            <p>Phone </p>
                                            <input id="s_phone" type="text" placeholder="Phone Number"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <p>Order Notes </p>
                                    <textarea name="massage"
                                              placeholder="Notes about Your Order, e.g.Special Note for Delivery"></textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="order-area">
                        <h3>Your Order</h3>
                        <ul class="total-cost">
                            @php
                                $sub_total = 0;
                            @endphp
                            @foreach($cart_items as $item)

                                @php
                                    $product = $item->product;
                                    $total_price = $product->price * $item->quantity;
                                    $sub_total += $total_price

                                @endphp
                                <li>{{$item->product->name}} <span class="pull-right">{{$item->quantity}} x {{$product->price}} = {{ $total_price}} </span>
                                </li>
                            @endforeach

                            <li>Subtotal <span class="pull-right"><strong>{{$sub_total}}</strong></span></li>
                            <li>Shipping <span class="pull-right">Free</span></li>
                            <li>Total<span class="pull-right">{{$sub_total}}</span></li>
                        </ul>
                        <ul class="payment-method">
                            <li>
                                <input id="bank" type="checkbox">
                                <label for="bank">Direct Bank Transfer</label>
                            </li>
                            <li>
                                <input id="paypal" type="checkbox">
                                <label for="paypal">Paypal</label>
                            </li>
                            <li>
                                <input id="card" type="checkbox">
                                <label for="card">Credit Card</label>
                            </li>
                            <li>
                                <input id="delivery" type="checkbox">
                                <label for="delivery">Cash on Delivery</label>
                            </li>
                        </ul>
                        <button>Place Order</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-frontend.layout>
