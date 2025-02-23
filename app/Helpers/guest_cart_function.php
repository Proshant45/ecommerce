<?php

    use App\Http\Controllers\CartController;
    use App\Http\Controllers\WishlistController;

    function guestCart()
    {
        return CartController::sessionCart();

    }

    function wishlist()
    {
        return WishlistController::navWishlist();

    }


