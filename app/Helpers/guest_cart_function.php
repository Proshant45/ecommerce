<?php
    use App\Http\Controllers\CartController;
    function guestCart()
    {
        return CartController::sessionCart();

    }


