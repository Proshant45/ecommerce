<?php

    namespace App\Models;

    use App\Models\Product;
    use Database\Factories\CategoryFactory;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsToMany;

    class Category extends Model
    {
        /** @use HasFactory<CategoryFactory> */
        use HasFactory;

        protected $fillable = ['name', 'slug', 'is_active'];

        public function products(): BelongsToMany
        {
            return $this->belongsToMany(Product::class);

        }
    }
