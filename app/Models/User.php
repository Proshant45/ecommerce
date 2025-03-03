<?php

    namespace App\Models;

    // use Illuminate\Contracts\Auth\MustVerifyEmail;
    use Filament\Models\Contracts\FilamentUser;
    use Filament\Panel;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Relations\BelongsToMany;
    use Illuminate\Database\Eloquent\Relations\HasMany;
    use Illuminate\Database\Eloquent\Relations\HasOne;
    use Illuminate\Foundation\Auth\User as Authenticatable;
    use Illuminate\Notifications\Notifiable;


    class User extends Authenticatable implements FilamentUser
    {
        /** @use HasFactory<\Database\Factories\UserFactory> */
        use HasFactory, Notifiable;

        /**
         * The attributes that are mass assignable.
         *
         * @var list<string>
         */
        protected $fillable = [
            'name',
            'email',
            'phone',
            'password',
        ];

        /**
         * The attributes that should be hidden for serialization.
         *
         * @var list<string>
         */
        protected $hidden = [
            'password',
            'remember_token',
        ];

        /**
         * Get the attributes that should be cast.
         *
         * @return array<string, string>
         */

        public function canAccessPanel(Panel $panel): bool
        {
            if ($panel->getId() === 'admin') {
                return str_ends_with($this->email, 'admin@test') && $this->hasVerifiedEmail();
            }

            return true;
        }

        protected function casts(): array
        {
            return [
                'email_verified_at' => 'datetime',
                'password' => 'hashed',
            ];
        }

        public function roles(): BelongsToMany
        {
            return $this->belongsToMany(Role::class);
        }

        public function hasRole(string $role): bool
        {
            return $this->roles->contains('name', $role);
        }

        public function cart(): HasOne
        {
            return $this->hasOne(Cart::class);

        }

        public function wishlist(): HasOne
        {
            return $this->hasOne(Wishlist::class);
        }

        public function addresses(): HasMany
        {
            return $this->hasMany(Address::class);
        }

        public function reviews(): HasMany
        {
            return $this->hasMany(Review::class);
        }

        public function billingAddress(): HasOne
        {
            return $this->hasOne(Address::class)->where('type', 'billing');
        }

        public function shippingAddress(): HasOne
        {
            return $this->hasOne(Address::class)->where('type', 'shipping');
        }

        public function orders(): HasMany
        {
            return $this->hasMany(Order::class);
        }

        public function paymentMethod(): HasMany
        {
            return $this->hasMany(PaymentMethod::class);
        }

        public function blog(): HasMany
        {
            return $this->hasMany(Blog::class);

        }


    }
