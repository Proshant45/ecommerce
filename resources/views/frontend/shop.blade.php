<x-frontend.layout>
    <!-- product-area start -->

    <div class="product-area pt-100">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <div class="product-menu">
                        <ul class="nav justify-content-center">
                            <li>
                                <a class="active" data-toggle="tab" href="#all">All product</a>
                            </li>
                            @foreach($categories as $category)

                                <li>
                                    <a data-toggle="tab" href="#{{$category->slug}}">{{$category->name}}</a>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
            <div class="tab-content">
                <div class="tab-pane active" id="all">
                    <ul class="row">
                        @foreach($products as $product)
                            <li class="col-xl-3 col-lg-4 col-sm-6 col-12">

                                <div class="product-wrap">
                                    <div class="product-img">
                                        <span>Sale</span>
                                        <img src="{{asset('assets')}}/images/product/15.jpg" alt="">
                                        <div class="product-icon flex-style">
                                            <ul>
                                                <li><a data-toggle="modal" data-target="#exampleModalCenter"
                                                       href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                                <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                                <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h3><a href="shop/{{$product->slug}}">{{$product->name}}</a></h3>
                                        <p class="pull-left">{{$product->price}}
                                        </p>
                                        <ul class="pull-right d-flex">
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star-half-o"></i></li>
                                        </ul>
                                    </div>
                                </div>

                            </li>
                        @endforeach
                    </ul>
                    {{ $products->links() }}
                </div>

                @foreach($categories as $category)
                    <div class="tab-pane" id="{{$category->slug}}">
                        <div class="row">
                            @php
                                $category_product = $category->products()->paginate(8);
                            @endphp
                            @foreach($category_product as $product)
                                <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                    <div class="product-wrap">
                                        <div class="product-img">
                                            <span>Sale</span>
                                            <img src="{{asset('assets')}}/images/product/18.jpg" alt="">
                                            <div class="product-icon flex-style">
                                                <ul>
                                                    <li><a data-toggle="modal" data-target="#exampleModalCenter"
                                                           href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                                    <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                                    <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <h3><a href="/">{{$product->name}}</a></h3>
                                            <p class="pull-left">{{$product->price}}
                                            </p>
                                            <ul class="pull-right d-flex">
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star-half-o"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>

                            @endforeach
                            {{ $category_product->links( ) }}
                        </div>
                    </div>
                @endforeach

            </div>
         </div>
        </div>
    </div>
    <x-frontend.news-letter/>
</x-frontend.layout>
