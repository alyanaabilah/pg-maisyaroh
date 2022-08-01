<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Coupon extends Model
{
    protected $guarded = ['id'];

    public function couponuser()
    {
        return $this->hasMany(CouponUser::class, 'id', 'coupon_id');
    }
}
