<x-frontend.layout>

    <!-- single-product-area start-->
    <div class="single-product-area ptb-100">
        <div class="container">
            @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}

                </div>
            @endif
            <div class="row">
                <div class="col-lg-6">
                    <div class="product-single-img">
                        <div class="product-active owl-carousel">

                            @foreach($product->images as $image)

                                <div class="item">
                                    <img src="{{asset("storage/".$image->path)}}" alt="">
                                </div>
                            @endforeach
                            <div class="item">
                                <img src="{{asset("storage/".$product->image)}}" alt="">
                            </div>


                        </div>
                        <div class="product-thumbnil-active  owl-carousel">
                            @if( $product->images->count() > 0)
                                @foreach($product->images as $image)
                                    <div class="item">
                                        <img src="{{asset("storage/".$image->path)}}" alt="">
                                    </div>

                                @endforeach

                            @endif


                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product-single-content">
                        <h3>{{$product->name}}</h3>
                        <div class="rating-wrap fix">
                            <span class="pull-left">219.56 Taka</span>
                            <ul class="rating pull-right">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li>(05 Customar Review)</li>
                            </ul>
                        </div>
                        <p>
                            {{$product->description}}
                        </p>
                        <ul class="input-style ">
                            <form action="/cart/{{$product->id}}" method="post">
                                @csrf
                                <li class="quantity cart-plus-minus">
                                    <input type="text" name="quantity" value="1"/>
                                </li>
                                <li>
                                    <button style="background-color: #fb923c; border:none; padding:4px; ">Add to Cart
                                    </button>
                                </li>
                            </form>
                        </ul>
                        <ul class="cetagory">
                            <li>Categories:</li>
                            @foreach($product->categories as $category)
                                <li><a href="/category/{{$category->slug}}">{{$category->name}}</a></li>
                            @endforeach

                        </ul>
                        <ul class="socil-icon">
                            <li>Share :</li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row mt-60">
                <div class="col-12">
                    <div class="single-product-menu">
                        <ul class="nav">
                            <li><a class="active" data-toggle="tab" href="#description">Description</a></li>
                            <li><a data-toggle="tab" href="#tag">Faq</a></li>
                            <li><a data-toggle="tab" href="#review">Review</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12">
                    <div class="tab-content">
                        <div class="tab-pane active" id="description">
                            <div class="description-wrap">
                                <p>{{$product->description}}</p>
                            </div>
                        </div>
                        <div class="tab-pane" id="tag">
                            <div class="faq-wrap" id="accordion">
                                @foreach($product->faqs as $faq)
                                    <div class="card">
                                        <div class="card-header" id="headingOne">
                                            <h5>
                                                <button data-toggle="collapse" data-target="#{{$faq->id}}"
                                                        aria-expanded="false"
                                                        aria-controls="{{$faq->id}}">{{$faq->question}} ?
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="{{$faq->id}}" class="collapse show" aria-labelledby="headingOne"
                                             data-parent="#accordion">
                                            <div class="card-body">
                                                {{$faq->answer}}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane" id="review">
                            <div class="review-wrap">
                                <ul>
                                    @foreach($product->reviews as $review)
                                        <li class="review-items">
                                            <div class="review-img">
                                                <img src="{{asset('assets')}}/images/comment/1.png" alt="">
                                            </div>
                                            <div class="review-content">
                                                <h3>{{$review->user->name}}</h3>
                                                <span>{{$review->created_at}}</span>
                                                <p>{{$review->review}}</p>
                                                <ul class="rating">
                                                    @for($i = 1; $i <= $review->rating; $i++)
                                                        <li><i class="fa fa-star"></i></li>
                                                    @endfor
                                                    <li>({{$review->rating}})</li>
                                                </ul>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="add-review">
                                <h4>Add A Review</h4>
                                <div class="ratting-wrap">
                                    <table>
                                        <thead>
                                        <tr>
                                            <th>task</th>
                                            <th>1 Star</th>
                                            <th>2 Star</th>
                                            <th>3 Star</th>
                                            <th>4 Star</th>
                                            <th>5 Star</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>How Many Stars?</td>
                                            <td>
                                                <input type="radio" name="a"/>
                                            </td>
                                            <td>
                                                <input type="radio" name="a"/>
                                            </td>
                                            <td>
                                                <input type="radio" name="a"/>
                                            </td>
                                            <td>
                                                <input type="radio" name="a"/>
                                            </td>
                                            <td>
                                                <input type="radio" name="a"/>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <h4>Name:</h4>
                                        <input type="text" placeholder="Your name here..."/>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <h4>Email:</h4>
                                        <input type="email" placeholder="Your Email here..."/>
                                    </div>
                                    <div class="col-12">
                                        <h4>Your Review:</h4>
                                        <textarea name="massage" id="massage" cols="30" rows="10"
                                                  placeholder="Your review here..."></textarea>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn-style">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- single-product-area end-->
    <x-frontend.best_seller/>
    <!-- featured-product-area end -->
</x-frontend.layout>
