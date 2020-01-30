<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function getRouteKeyName()
    {
        return 'name';
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
}
