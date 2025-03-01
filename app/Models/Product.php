<?php

    namespace App\Models;

    use Database\Factories\ProductFactory;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsToMany;
    use Illuminate\Database\Eloquent\Relations\HasMany;
    use App\Models\Review;

    class Product extends Model
    {
        /** @use HasFactory<ProductFactory> */
        use HasFactory;

        protected $fillable = ['name', 'slug', 'price', 'description', 'is_active', 'stock', 'image', 'discount_rate'];

        public function category($id)
        {
            $category = Category::find($id);
            $this->categories()->attach($category);
        }

        public function categories(): BelongsToMany
        {
            return $this->belongsToMany(Category::class);
        }

        public function images(): HasMany
        {
            return $this->hasMany(Image::class);
        }

        public function reviews(): HasMany
        {
            return $this->hasMany(Review::class);
        }

        public function averageRating()
        {
            return $this->reviews()->avg('rating');
        }

        public function faqs(): HasMany
        {
            return $this->hasMany(Faq::class);
        }

        public function orders(): BelongsToMany
        {
            return $this->belongsToMany(Order::class);
        }

    }
