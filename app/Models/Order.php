<?php

namespace App\Models;

use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function provinces()
    {
        return $this->belongsTo(Province::class, 'provinces_id', 'id');
    }

    public function regencies()
    {
        return $this->belongsTo(Regency::class, 'regencies_id', 'id');
    }

    // public function getCreatedAtAttribute()
    // {
    //     return \Carbon\Carbon::parse($this->attributes['created_at'])->translatedFormat('d F Y'); 
    // }
}
