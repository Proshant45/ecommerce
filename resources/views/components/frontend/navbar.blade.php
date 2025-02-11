@php
    $guest_cart_item = guestCart();
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
                    <form action="#">
                        <input type="text" placeholder="Search Here...">
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
                                    <li><a href="{{url('/setting')}}">Settings</a></li>
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
                                    {{auth()->user()->cart->totalQuantity()}}
                                </span></a>
                            @else
                                <a href="javascript:void(0);"><i class="flaticon-shop"></i> <span>

                                    {{count($guest_cart_item)}}
                                </span></a>
                            @endif

                            <ul class="cart-wrap dropdown_style">
                                @php
                                    $total = 0;
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
                                                <p>{{$item->product->price}}</p>
                                            </div>
                                        </li>
                                        @php
                                            $total += $item['quantity']* $item->product->price;
                                        @endphp
                                    @endforeach

                                    <li>Subtotol: <span class="pull-right">${{$total}}</span></li>
                                    <li>
                                        <button>Check Out</button>
                                    </li>
                                @endif

                                @if(auth()->check())
                                    @php
                                        $cart_items = auth()->user()->cart->items;
                                        $total = 0;
                                    @endphp
                                    @foreach($cart_items as $item)
                                        <li class="cart-items">
                                            <div class="cart-img">
                                                <img src="{{asset('assets')}}/images/cart/3.jpg" alt="">
                                            </div>

                                            <div class="cart-content">
                                                <a href="/shop/{{$item->product->slug}}">{{$item->product->name}}</a>
                                                <span>QTY : {{$item->quantity}}</span>
                                                <p>{{$item->product->price}} TK</p>
                                                <i class="fa fa-times"></i>
                                            </div>
                                        </li>
                                        @php

                                            $total += $item->quantity * $item->product->price;
                                        @endphp
                                    @endforeach

                                    <li>Subtotol: <span class="pull-right">{{$total}} TK</span></li>
                                    <li>
                                        <button>Check Out</button>
                                    </li>
                                @endif
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);"><i class="flaticon-shop"></i> <span>3</span></a>
                            <ul class="cart-wrap dropdown_style">
                                <li class="cart-items">
                                    <div class="cart-img">
                                        <img src="{{asset('assets')}}/images/cart/1.jpg" alt="">
                                    </div>
                                    <div class="cart-content">
                                        <a href="cart.html">Pure Nature Product</a>
                                        <span>QTY : 1</span>
                                        <p>$35.00</p>
                                        <i class="fa fa-times"></i>
                                    </div>
                                </li>
                                <li class="cart-items">
                                    <div class="cart-img">
                                        <img src="{{asset('assets')}}/images/cart/3.jpg" alt="">
                                    </div>
                                    <div class="cart-content">
                                        <a href="cart.html">Pure Nature Product</a>
                                        <span>QTY : 1</span>
                                        <p>$35.00</p>
                                        <i class="fa fa-times"></i>
                                    </div>
                                </li>
                                <li class="cart-items">
                                    <div class="cart-img">
                                        <img src="{{asset('assets')}}/images/cart/2.jpg" alt="">
                                    </div>
                                    <div class="cart-content">
                                        <a href="cart.html">Pure Nature Product</a>
                                        <span>QTY : 1</span>
                                        <p>$35.00</p>
                                        <i class="fa fa-times"></i>
                                    </div>
                                </li>
                                <li>Subtotol: <span class="pull-right">$70.00</span></li>
                                <li>
                                    <button>Check Out</button>
                                </li>
                            </ul>
                        </li>
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
