<x-frontend.layout>
    <div class="product-area pt-100">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <div class="product-menu">
                        <ul class="nav justify-content-center">
                            <li>
                                <a class="{{ request('category') ? '' : 'active' }}" href="{{ route('shop.index') }}">All
                                    products</a>
                            </li>
                            @foreach($categories as $category)
                                <li>
                                    <a class="{{ request('category') == $category->slug ? 'active' : '' }}"
                                       href="{{ route('shop.index', ['category' => $category->slug]) }}">
                                        {{ $category->name }}
                                    </a>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>

            <div class="tab-content">
                <div class="tab-pane active">
                    <ul class="row">
                        @foreach($products as $product)
                            <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                <div class="product-wrap">
                                    <div class="product-img">
                                        <span style="z-index:1">{{$product->discount_rate}} %</span>
                                        <img src="{{asset('assets')}}/images/product/15.jpg" alt="">
                                        <div class="product-icon flex-style">
                                            <ul>
                                                <li><a data-toggle="modal" data-target="#exampleModalCenter"
                                                       href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                                <li><a href="/wishlist/{{$product->id}}"><i class="fa fa-heart"></i></a>
                                                </li>
                                                <li><a href="/cart/{{$product->id}}"><i class="fa fa-shopping-bag"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h3><a href="shop/{{$product->slug}}">{{$product->name}}</a></h3>
                                        <p class="pull-left">
                                            <del class="pr-3">{{$product->price}}</del>
                                            <span>  {{$product->price - (($product->discount_rate)/100)*$product->price}} </span>
                                        </p>
                                        <ul class="pull-right d-flex">
                                            @for($i = 1; $i <= $product->averageRating(); $i++)
                                                <li><i class="fa fa-star"></i></li>
                                            @endfor
                                        </ul>
                                    </div>
                                </div>

                            </li>
                        @endforeach
                    </ul>
                    {{ $products->appends(request()->query())->links() }}
                </div>
            </div>
        </div>
    </div>
    
    <x-frontend.news-letter/>
</x-frontend.layout>
