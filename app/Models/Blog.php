<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;
    use Illuminate\Database\Eloquent\Relations\HasMany;

    class Blog extends Model
    {
        /** @use HasFactory<\Database\Factories\BlogFactory> */
        use HasFactory;

        protected $fillable = ['user_id', 'body', 'title', 'slug', 'image'];

        public function user(): BelongsTo
        {
            return $this->belongsTo(User::class);
        }

        public function comments(): HasMany
        {
            return $this->hasMany(Comment::class);
        }

    }
