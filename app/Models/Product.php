<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    /**
     * Mass assignable attributes.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'merchant_id',
        'name',
        'slug',
        'description',
        'price',
        'image',
        'status',
    ];

    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }

    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }


    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/' . $this->image) : null;
    }
    
    public function revisions()
    {
        return $this->hasMany(ProductRevision::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
