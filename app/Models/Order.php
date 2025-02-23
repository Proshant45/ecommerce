<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\HasMany;

    class Order extends Model
    {
        /** @use HasFactory<\Database\Factories\OrderFactory> */
        use HasFactory;

        protected $fillable = [
            'user_id', 'payment_method', 'status', 'cart_items', 'total_price', 'shipping_address'
            , 'shipping_address', 'billing_address', 'payment_status', 'payment_id'
        ];


        public function user()
        {
            return $this->belongsTo(User::class);
        }

        public function address(): HasMany
        {
            return $this->hasMany(Address::class);
        }

        public function paymentMethod()
        {
            return $this->belongsTo(PaymentMethod::class);
        }


        protected function casts(): array
        {
            return [
                'shipping_address' => 'json',
                'billing_address' => 'json',
                'cart_items' => 'json'

            ];
        }

    }


