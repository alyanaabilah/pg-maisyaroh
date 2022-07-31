<?php

namespace App\Http\Controllers\report;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\CouponUser;

class CouponUserController extends Controller
{
    public function index()
    {
        $kupon = CouponUser::all();
        return view('admin.report.subsidi', [
            "title" => "Data Pelanggan Subsidi",
            "kupon" => $kupon
            //"user" => User::where('ceklevel', 'subsidi')->get(),
            //"coupon" => Coupon::all()
        ]);
    }
}
