<?php

namespace App\Http\Controllers\front;

use App\Models\Order;
use App\Models\Regency;
use App\Models\Province;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MyOrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->get();
        return view('front.my-order', [
            "orders" => $orders,
            "title" => "Pangkalan Gas Maisyaroh | Orders",
            "active" => "orders",
            "judul" => "Pesanan Saya",
        ]);
    }

    public function show($id)
    {
        $orders = Order::where('id', $id)->where('user_id', Auth::id())->first();
        return view('front.order-detail', [
            "order" => $orders,
            "title" => "Pangkalan Gas Maisyaroh | Orders",
            "active" => "orders",
            "judul" => "Detail Pesanan",


        ]);
    }
}
