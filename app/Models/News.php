<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class News extends Model
{
    protected $fillable = [
        'title',
        'content',
        'image',
        'slug',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($news) {
            $news->slug = Str::slug($news->title);
        });
        static::updating(function ($news) {
            $news->slug = Str::slug($news->title);
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
