<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
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
        $orders = Order::where('id', $id)->where('user_id', Auth::id())->get();
        return view('front.order-detail', [
            "orders" => $orders,
            "title" => "Pangkalan Gas Maisyaroh | Orders",
            "active" => "orders",
            "judul" => "Detail Pesanan"
        ]);
    }
}
