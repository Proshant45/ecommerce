<div>
    <!-- Modal backdrop -->
    <div x-data
         x-show="$wire.isOpen"
         x-on:keydown.escape.window="$wire.closeModal()"
         class="fixed inset-0 z-50 bg-black/50 flex items-center justify-center p-4"
         style="display: none;">

        <!-- Modal content -->
        <div x-show="$wire.isOpen"
             x-on:click.away="$wire.closeModal()"
             class="bg-white dark:bg-gray-800 rounded-xl shadow-xl w-11/12 md:w-1/2 max-w-2xl max-h-[90vh] overflow-y-auto">

            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 border-b dark:border-gray-700">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    @if($product)
                        {{ $product->name }}
                    @else
                        Product Preview
                    @endif
                </h3>
                <button wire:click="closeModal" type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 dark:hover:bg-gray-600 hover:text-gray-900 dark:hover:text-white rounded-lg p-1.5 inline-flex items-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <!-- Modal body -->
            <div class="p-6">
                @if($product)
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Product Image -->
                        <div class="flex items-center justify-center">
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                     class="max-w-full h-auto rounded-lg shadow">
                            @else
                                <div class="bg-gray-100 dark:bg-gray-700 rounded-lg w-full h-64 flex items-center justify-center">
                                    <svg class="w-12 h-12 text-gray-400 dark:text-gray-500"
                                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                            @endif
                        </div>

                        <!-- Product Details -->
                        <div>
                            <h2 class="text-2xl font-bold mb-2 text-gray-900 dark:text-white">{{ $product->name }}</h2>
                            <p class="text-gray-700 dark:text-gray-300 mb-4">{{ $product->description }}</p>

                            <div class="mt-4">
                                <span class="text-xl font-bold text-blue-600 dark:text-blue-400">${{ number_format($product->price, 2) }}</span>

                                @if(isset($product->discount_rate) && $product->discount_rate > 0)
                                    <span class="ml-2 line-through text-gray-500">${{ number_format($product->regular_price, 2) }}</span>
                                    <span class="ml-2 bg-red-100 dark:bg-red-900 text-red-800 dark:text-red-300 text-xs font-semibold px-2 py-1 rounded">{{ $product->discount_rate }}% OFF</span>
                                @endif
                            </div>

                            <div class="mt-6">
                                <span class="font-medium text-gray-700 dark:text-gray-300">Availability: </span>
                                @if($product->stock)
                                    <span class="text-green-600 dark:text-green-400">In Stock</span>
                                @else
                                    <span class="text-red-600 dark:text-red-400">Out of Stock</span>
                                @endif
                            </div>


                            @if(isset($product->category))
                                <div class="mt-4">
                                    <span class="font-medium text-gray-700 dark:text-gray-300">Category: </span>
                                    <span class="text-gray-600 dark:text-gray-400">{{ $product->category->name ?? 'Uncategorized' }}</span>
                                </div>
                            @endif

                            <div class="mt-6 text-sm text-gray-500 dark:text-gray-400">
                                Last updated: {{ $product->updated_at->format('Y-m-d H:i') }}
                            </div>
                        </div>
                    </div>
                @else
                    <div class="flex items-center justify-center h-32">
                        <div role="status">
                            <svg aria-hidden="true"
                                 class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
                                 viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                      fill="currentColor"/>
                                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                      fill="currentFill"/>
                            </svg>
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Modal footer -->
            <div class="flex items-center justify-end p-4 border-t dark:border-gray-700">
                @if($product && $product->stock)
                    <button type="button"
                            class="mr-2 px-4 py-2 bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 text-white font-medium rounded-lg text-sm">
                        Add to Cart
                    </button>
                @endif
                <button type="button" wire:click="closeModal"
                        class="px-4 py-2 bg-gray-200 hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-gray-100 text-gray-800 font-medium rounded-lg text-sm dark:bg-gray-700 dark:hover:bg-gray-600 dark:text-white dark:focus:ring-gray-600">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>