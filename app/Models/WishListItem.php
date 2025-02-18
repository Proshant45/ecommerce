<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class WishListItem extends Model
    {

        protected $fillable = ['product_id', 'wishList_id'];

        public function wishlist()
        {
            return $this->belongsTo(Cart::class);
        }

        public function product()
        {
            return $this->belongsTo(Product::class);
        }


    }
