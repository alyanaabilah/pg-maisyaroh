<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laba extends Model
{
    protected $table = 'labas';
    protected $guarded = ['id'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function orderitem()
    {
        return $this->belongsTo(OrderItem::class, 'orderitem_id', 'id');
    }
    public function incoming()
    {
        return $this->belongsTo(IncomingProduct::class, 'incoming_id', 'id');
    }
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
} 
