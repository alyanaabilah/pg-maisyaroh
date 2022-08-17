<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Brand;
use App\Models\IncomingProduct;

class Product extends Model
{
    //use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['category', 'brand'];

    public function scopeFilter($query, array $filters)
    {
        if (request('search')) {
            return  $query->where('name', 'like', '%' . request('search') . '%');
        }
    }
    public function getCreatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['created_at'])->translatedFormat('d F Y'); 
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }



    public function IncomingProduct()
    {
        return $this->hasMany(IncomingProduct::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
