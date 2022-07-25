<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $guarded = ['id'];
    protected $with = ['product'];
    // protected $appends = ['total_price'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
