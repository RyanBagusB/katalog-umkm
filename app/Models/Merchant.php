<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'slug',
        'is_active',

        // Tambahan kolom baru
        'tagline',
        'banner_description',
        'banner_image',

        'feature_1_title',
        'feature_1_desc',
        'feature_2_title',
        'feature_2_desc',
        'feature_3_title',
        'feature_3_desc',
        'feature_4_title',
        'feature_4_desc',

        'about_description',
        'about_image',

        'contact_description',
        'contact_image',
        'contact_address',
        'contact_phone',
        'contact_email',
        'contact_instagram',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Optional: scope untuk memastikan data lengkap
    public function scopeComplete($query)
    {
        return $query->whereNotNull('name')
            ->whereNotNull('banner_image')
            ->whereNotNull('banner_description')
            ->whereNotNull('about_image')
            ->whereNotNull('about_description')
            ->whereNotNull('contact_image')
            ->whereNotNull('contact_description');
    }
}
