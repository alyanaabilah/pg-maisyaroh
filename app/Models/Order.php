<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $guarded = ['id'];

    // public function shipping()
    // {
    //     return $this->hasOne(Shipping::class);
    // }

    public function orderitem()
    {
        return $this->hasMany(OrderItem::class);
    }
}
