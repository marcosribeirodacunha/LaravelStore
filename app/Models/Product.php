<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    protected $fillable = [
        'category',
        'name',
        'price',
        'description'
    ];

    protected $casts = [
        'active' => 'boolean',
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    /*public function setUnitsInStockAttribute($value)
    {
        if (!empty($value)) {
            $this->attributes['units_in_stock'] = $this->attributes['units_in_stock'] + $value;
        }
    }

    public function setActiveAttribute($value)
    {
        if ($this->attributes['units_in_stock'] <= 0 ) {
            $this->attributes['active'] = 0;

        } else {
            $this->attributes['active'] = $value;
        }
    }*/

    // Overriding Eloquent getRouteKeyName method to be able to search for the product using slug and not id
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
