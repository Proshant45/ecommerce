<?php

    use App\Http\Controllers\CartController;
    use App\Http\Controllers\CategoryController;
    use App\Http\Controllers\CheckOutController;
    use App\Http\Controllers\ContactController;
    use App\Http\Controllers\HomeController;
    use App\Http\Controllers\ProductController;
    use App\Http\Controllers\ProfileController;
    use App\Http\Controllers\WishlistController;
    use Illuminate\Support\Facades\Route;

    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/about', [HomeController::class, 'about'])->name('about');
    Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
    Route::post('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');
    Route::post('/cart/coupon', [CartController::class, 'applyCoupon'])->name('cart.coupon');
    Route::get('/shop', [ProductController::class, 'index'])->name('shop.index');
    Route::get('/shop/{slug}', [ProductController::class, 'show'])->name('shop.show');
    Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

    Route::get('/cart', [CartController::class, 'cart'])->name('cart.index');
    Route::post('/cart', [CartController::class, 'checkout'])->name('cart.store');
    Route::post('/cart/{id}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/cart/{id}', [CartController::class, 'addToCart'])->name('cart.add.product');
    Route::get('/cart/{slug}', [CartController::class, 'show'])->name('cart.show');
    Route::get('/cart/delete/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');

    Route::get('/wishlist', [WishlistController::class, 'wishlist'])->name('wishlist.index');
    Route::get('/wishlist/{id}', [WishlistController::class, 'addToWislist'])->name('wishlist.add');
    Route::get('/wishlist/{slug}', [WishlistController::class, 'show'])->name('wishlist.show');
    Route::get('/wishlist/delete/{id}', [WishlistController::class, 'removeFromwishlist'])->name('wishlist.remove');

    Route::get('/checkout', [CheckOutController::class, 'create'])->name('checkout.index');
    Route::get('/blog', [HomeController::class, 'blog'])->name('blog.show');
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/about', [HomeController::class, 'about'])->name('about');
    Route::get('/contact', [HomeController::class, 'contact'])->name('contact');


    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::post('/checkout', [CheckOutController::class, 'store'])->name('checkout.store');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::get('/profile/setting', [ProfileController::class, 'edit'])->name('profile.edit');
    });

    require __DIR__.'/auth.php';

