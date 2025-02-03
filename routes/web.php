<?php

    use App\Http\Controllers\ContactController;
    use App\Http\Controllers\HomeController;
    use App\Http\Controllers\ProductController;
    use App\Http\Controllers\ProfileController;
    use Illuminate\Support\Facades\Route;

    Route::middleware('guest')->group(function () {
        Route::get('/', [HomeController::class, 'index']);
        Route::get('/about', [HomeController::class, 'about'])->name('about');
        Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

    });

    Route::get('shop', [ProductController::class, 'index'])->name('shop.index');
    Route::get('shop/{slug}', [ProductController::class, 'show'])->name('shop.show');
    Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
    Route::get('admin/product_upload', [ProductController::class, 'create'])->name('product.create');
    Route::post('admin/product_upload', [ProductController::class, 'store'])->name('product.store');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    require __DIR__.'/auth.php';
