<?php

namespace App\Models;

use App\Models\Traits\Translatable;
use App\Services\CurrencyConversion;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use Translatable;

    protected $fillable = [
        'name', 'code', 'price', 'description', 'count'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
        // return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->belongsToMany(Image::class);
        // return $this->belongsTo(Category::class);
    }

    public function isAvailable()
    {
        return $this->count > 0;
    }

    public function skus()
    {
        return $this->hasMany(Sku::class);
    }

    public function properties()
    {
        return $this->belongsToMany(Property::class, 'property_product')->withTimestamps();
    }

    public function scopeByCode($query, $code)
    {
        return $query->where('code', $code);
    }

}
