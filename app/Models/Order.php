<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\HasMany;

    class Order extends Model
    {
        /** @use HasFactory<\Database\Factories\OrderFactory> */
        use HasFactory;

        public function items()
        {
            return $this->hasMany(OrderItem::class);
        }

        public function user()
        {
            return $this->belongsTo(User::class);
        }

        public function address(): HasMany
        {
            return $this->hasMany(Address::class);
        }

    }


