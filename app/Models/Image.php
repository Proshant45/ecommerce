<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;
    use Spatie\MediaLibrary\HasMedia;
    use Spatie\MediaLibrary\InteractsWithMedia;
    use Spatie\Image\Enums\Fit;
    use Spatie\MediaLibrary\MediaCollections\Models\Media;

    class Image extends Model implements HasMedia
    {
        use InteractsWithMedia;

        protected $fillable = [
            'path',
            'name', 'product_id', 'is_main'
        ];

        public function registerMediaConversions(?Media $media = null): void
        {
            $this
                ->addMediaConversion('preview')
                ->fit(Fit::Contain, 300, 300)
                ->nonQueued();
        }

        public function product(): BelongsTo
        {
            return $this->belongsTo(Product::class);
        }

    }

