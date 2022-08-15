<?php

namespace App\Http\Controllers\report;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class UserLoyalController extends Controller
{
    public function userloyal()
    {
        $user = (new Order())->groupBy('user_id', 'total_price', 'date')->selectRaw('count(user_id) as most_orders, user_id, date(created_at) as date, total_price')->orderBy('most_orders', 'desc')->get();
        return view('admin.dashboard.user-order',[
            "title" => "User Terloyal",
            "users" => $user
        ]);
    }
}
