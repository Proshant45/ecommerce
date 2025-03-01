@php
    $guest_cart_item = guestCart();
    if(auth()->check()){
        $wishlist_items = wishlist();

    }
@endphp
<div class="preloader-wrap">
    <div class="spinner"></div>
</div>
<!-- search-form here -->
<div class="search-area flex-style">
    <span class="closebar">Close</span>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 col-12">
                <div class="search-form">
                    <form action="/search" method="get">
                        @csrf
                        <input type="text" placeholder="Search Here..." name="q">
                        <button><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- header-area start -->
<header class="header-area">
    <div class="header-top bg-2">
        <div class="fluid-container">
            <div class="row">
                <div class="col-md-6 col-12">
                    <ul class="d-flex header-contact">
                        <li><i class="fa fa-phone"></i> +01 123 456 789</li>
                        <li><i class="fa fa-envelope"></i> youremail@gmail.com</li>
                    </ul>
                </div>
                <div class="col-md-6 col-12">
                    <ul class="d-flex account_login-area">
                        <li>
                            <a href="javascript:void(0);"><i class="fa fa-user"></i>
                                @if(auth()->check())
                                    {{auth()->user()->name}}
                                @else
                                    My Account
                                @endif
                                <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown_style">
                                @if(auth()->check())
                                    @if(url()->current() != url('/profile'))
                                        <li><a href="{{url('/profile')}}">Profile</a></li>
                                    @endif
                                    <li><a href="{{url('/profile/setting')}}">Settings</a></li>
                                    <li><a href="{{url('/orders')}}">Order</a></li>
                                    <li><a href="{{url('/wishlist')}}">Wishlist</a></li>
                                    <li><a href="{{ url('/logout') }}">Log out</a></li>
                                @else
                                    <li><a href="{{url('/login')}}" class="text-danger">Login</a></li>
                                    <li><a href="{{url('/register')}}">Register</a></li>
                                @endif
                                <li><a href="{{url('/cart')}}">Cart</a></li>
                                <li><a href="{{url('/checkout')}}">Checkout</a></li>
                            </ul>
                        </li>
                        <li>

                            @if (Route::has('login'))
                                @auth
                                    <a href="{{ url('/logout') }} " class="py-1">
                                        Log out
                                    </a>
                                @else
                                    <div class=" d-flex">
                                        <a class=" px-3 " href="{{ route('login') }} "> Log in </a>

                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}">Register</a>
                                        @endif
                                    </div>

                                @endauth
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom">
        <div class="fluid-container">
            <div class="row">
                <div class="col-lg-3 col-md-7 col-sm-6 col-6">
                    <div class="logo">
                        <a href=" {{url('/')}} ">
                            <img src="{{asset('assets')}}/images/logo.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-7 d-none d-lg-block">
                    <nav class="mainmenu">
                        <ul class="d-flex">
                            <li class="active"><a href="/">Home</a></li>
                            <li><a href="/about">About</a></li>
                            <li>
                                <a href="javascript:void(0);">Shop <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown_style">
                                    <li><a href="/shop">Shop Page</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript:void(0);">Blog <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown_style">
                                    <li><a href="/blog">blog Page</a></li>

                                </ul>
                            </li>
                            <li><a href="{{url("contact")}}">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-md-4 col-lg-2 col-sm-5 col-4">
                    <ul class="search-cart-wrapper d-flex">
                        <li class="search-tigger"><a href="javascript:void(0);"><i class="flaticon-search"></i></a></li>
                        <li>
                            @if(auth()->check())
                                <a href="javascript:void(0);"><i class="flaticon-shop"></i> <span>
                                        @if(auth()->user()->cart)
                                            {{--                                              requires only for database seeders--}}
                                            {{auth()->user()->cart->items->count()}}
                                        @else
                                            0
                                        @endif
                                </span></a>
                            @else
                                <a href="javascript:void(0);"><i class="flaticon-shop"></i> <span>

                                    {{count($guest_cart_item)}}
                                </span></a>
                            @endif

                            <ul class="cart-wrap dropdown_style">
                                @php
                                    $total = 0;
                                    $price_after_discount = 0;
                                @endphp
                                @if(!auth()->check() && count($guest_cart_item) > 0)

                                    @foreach($guest_cart_item as $item)
                                        <li class="cart-items">

                                            <div class="cart-img">
                                                <img src="{{asset('assets')}}/images/cart/3.jpg" alt="">
                                            </div>
                                            <div class="cart-content">
                                                <a href="/shop/{{$item->product->slug}}">{{$item->product->name}}</a>
                                                <span>QTY : {{$item['quantity']}}TK</span>
                                                <p>{{$item->product->price -($item->product->price * (($item->product->discount_rate)/100))}}</p>
                                            </div>
                                        </li>

                                        @php
                                            $price_after_discount += $item->product->price -($item->product->price* (($item->product->discount_rate)/100));
                                            $total += $item['quantity']* $item->product->price;
                                        @endphp
                                    @endforeach

                                    <li>Subtotol: <span class="pull-right">${{$total}}</span></li>
                                    <li>Discount: <span class="pull-right">${{$total - $price_after_discount}}</span>
                                    </li>
                                    <li>
                                        <button><a href="/checkout">Check Out</a></button>
                                    </li>
                                @endif

                                @if(auth()->check() && auth()->user()->cart)
                                    @php
                                        $cart_items = auth()->user()->cart->items;
                                        $total = 0;
                                        $price_after_discount = 0;

                                    @endphp
                                    @foreach($cart_items as $item)
                                        <li class="cart-items">
                                            <div class="cart-img">
                                                <img src="{{asset('assets')}}/images/cart/3.jpg" alt="">
                                            </div>

                                            <div class="cart-content">
                                                <a href="/shop/{{$item->product->slug}}">{{$item->product->name}}</a>
                                                <span>QTY : {{$item->quantity}}</span>
                                                <p>{{$item->product->price -($item->product->price * (($item->product->discount_rate)/100))}}</p>
                                                <a href="/cart/delete/{{$item->id}}"><i
                                                            class="fa fa-times"></i></a>
                                            </div>
                                        </li>
                                        @php
                                            $price_after_discount += ($item->product->price -($item->product->price* (($item->product->discount_rate)/100)))*$item->quantity;
                                            $total += $item->quantity * $item->product->price;
                                        @endphp
                                    @endforeach

                                    <li>Subtotol: <span class="pull-right">{{$price_after_discount}} TK</span></li>
                                    <li>Discount: <span class="pull-right">${{$total - $price_after_discount}}</span>
                                    <li>
                                        <button><a href="/checkout">Check Out</a></button>
                                    </li>
                                @endif
                            </ul>
                        </li>
                        @if(auth()->check())
                            <li>
                                <a href="javascript:void(0);"><i class="flaticon-like"></i> <span>
                                {{count($wishlist_items)}}
                                </span></a>
                                <ul class="cart-wrap dropdown_style">
                                    @foreach($wishlist_items as $item)
                                        <li class="cart-items">
                                            <div class="cart-img">
                                                <img src="{{asset('assets')}}/images/cart/3.jpg" alt="">
                                            </div>
                                            <div class="cart-content">
                                                <a href="/shop/{{$item->product->slug}}">{{$item->product->name}}</a>
                                                <span>QTY : {{$item->quantity}}</span>
                                                <p>{{$item->product->price}}</p>
                                                <a href="/wishlist/delete/{{$item->id}}"><i
                                                            class="fa fa-times"></i></a>
                                            </div>
                                        </li>
                                    @endforeach
                                    <li>Subtotol: <span class="pull-right">$70.00</span></li>
                                    <li>
                                        <button><a href="/wishlist">WishList</a></button>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
                <div class="col-md-1 col-sm-1 col-2 d-block d-lg-none">
                    <div class="responsive-menu-tigger">
                        <a href="javascript:void(0);">
                            <span class="first"></span>
                            <span class="second"></span>
                            <span class="third"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- responsive-menu area start -->
        <div class="responsive-menu-area">
            <div class="container">
                <div class="row">
                    <div class="col-12 d-block d-lg-none">
                        <ul class="metismenu">
                            <li><a href="">Home</a></li>
                            <li><a href="{{url("about")}}">About</a></li>
                            <li class="sidemenu-items">
                                <a class="has-arrow" aria-expanded="false" href="javascript:void(0);">Shop </a>
                                <ul aria-expanded="false">
                                    <li><a href="shop.html">Shop Page</a></li>
                                    <li><a href="single-product.html">Product Details</a></li>
                                    <li><a href="cart.html">Shopping cart</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                    <li><a href="wishlist.html">Wishlist</a></li>
                                </ul>
                            </li>
                            <li class="sidemenu-items">
                                <a class="has-arrow" aria-expanded="false" href="javascript:void(0);">Pages </a>
                                <ul aria-expanded="false">
                                    <li><a href="{{url("about")}}">About Page</a></li>
                                    <li><a href="single-product.html">Product Details</a></li>
                                    <li><a href="cart.html">Shopping cart</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                    <li><a href="wishlist.html">Wishlist</a></li>
                                    <li><a href="faq.html">FAQ</a></li>
                                </ul>
                            </li>
                            <li class="sidemenu-items">
                                <a class="has-arrow" aria-expanded="false" href="javascript:void(0);">Blog</a>
                                <ul aria-expanded="false">
                                    <li><a href="blog.html">Blog</a></li>
                                    <li><a href="blog-details.html">Blog Details</a></li>
                                </ul>
                            </li>
                            <li><a href="{{url('contact')}}">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- responsive-menu area start -->
    </div>
</header>
<!-- header-area end -->
