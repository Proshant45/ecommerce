<?php

    namespace App\Models;

    use Database\Factories\ProductFactory;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsToMany;

    class Product extends Model
    {
        /** @use HasFactory<ProductFactory> */
        use HasFactory;

        protected $fillable = ['name', 'slug', 'price', 'description', 'is_active', 'stock', 'image', 'discount_price'];


        public function category($id)
        {
            $category = Category::find($id);
            $this->categories()->attach($category);
        }

        public function categories(): BelongsToMany
        {
            return $this->belongsToMany(Category::class);
        }

        public function images(): hasMany
        {
            return $this->hasMany(Image::class);
        }


    }
