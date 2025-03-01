<x-frontend.layout>
    <!-- Search Results Section -->
    <div class="search-results-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="mb-4">Search Results for "{{ request('q') }}"</h2>
                    <p class="text-muted">{{ $products->count() }} products found</p>
                </div>
            </div>

            @if($products->count() > 0)
                <div class="row">
                    @foreach($products as $product)
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                            <div class="product-card h-100 border rounded">
                                <div class="product-img text-center p-3">
                                    <img src="{{asset('assets')}}/images/product/15.jpg"
                                         alt="{{ $product->name }}" class="img-fluid">
                                </div>
                                <div class="product-content p-3">
                                    <h4 class="product-title h6 mb-2">
                                        <a href="/shop/{{ $product->slug }}">{{ $product->name }}</a>
                                    </h4>
                                    <div class="price-stock d-flex justify-content-between mb-3">
                                        <span class="price fw-bold">${{ $product->price }}</span>
                                        <span class="stock {{ $product->stock > 0 ? 'text-success' : 'text-danger' }}">
                                            {{ $product->stock > 0 ? 'In Stock' : 'Out of Stock' }}
                                        </span>
                                    </div>
                                    <div class="product-actions d-flex justify-content-between">
                                        <a href="/cart/{{ $product->id }}" class="btn btn-sm btn-primary">Add to
                                            Cart</a>
                                        @if(auth()->check())
                                            <a href="/wishlist/{{ $product->id }}"
                                               class="btn btn-sm btn-outline-secondary">
                                                <i class="fa fa-heart"></i>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="row">
                    <div class="col-12 text-center py-5">
                        <h4>No products found matching your search.</h4>
                        <p>Try different keywords or browse our categories.</p>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <x-frontend.news-letter/>
</x-frontend.layout>