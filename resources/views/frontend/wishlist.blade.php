<x-frontend.layout>
    <!-- cart-area start -->
    <div class="cart-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="http://themepresss.com/tf/html/tohoney/cart">
                        <table class="table-responsive cart-wrap">
                            <thead>
                            <tr>
                                <th class="images">Image</th>
                                <th class="product">Product</th>
                                <th class="ptice">Price</th>
                                <th class="stock">Stock Stutus</th>
                                <th class="addcart">Add to Cart</th>
                                <th class="remove">Remove</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $wishlist_items as $item)
                                <tr>
                                    <td class="images"><img src="{{asset('assets')}}/images/cart/4.jpg" alt=""></td>
                                    <td class="product"><a href="single-product.html">{{$item->product->name}}</a></td>
                                    <td class="ptice">{{$item->product->price}}</td>
                                    <td class="stock">{{ $item->product->stock }}</td>
                                    <td class="addcart"><a href="/cart/{{$item->product->id}}">Add to Cart</a></td>
                                    <td class="remove"><a href="/wishlist/delete/{{$item->id}}"><i
                                                    class="fa fa-times"></i></a></td>

                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <x-frontend.news-letter/>
</x-frontend.layout>
