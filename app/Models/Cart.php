<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\HasMany;

    class Cart extends Model
    {
        /** @use HasFactory<\Database\Factories\CartFactory> */
        use HasFactory;

        protected $fillable = ['user_id'];

        public function items(): HasMany
        {
            return $this->hasMany(CartItem::class);

        }

        public function totalQuantity()
        {
            return $this->items->sum('quantity');
        }

        public function user()
        {
            return $this->belongsTo(User::class);
        }

        public function totalAmount()
        {
            return $this->items->sum(function ($item) {
                return $item->quantity * $item->product->price;
            });
        }


    }
