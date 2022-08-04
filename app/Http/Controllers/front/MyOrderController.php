<?php

namespace App\Http\Controllers\front;

use App\Models\Order;
use App\Models\Regency;
use App\Models\Province;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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

    //simpan bukti transfer

    public function update(Request $request, $id)
    {
        $orders = Order::where('id', $id)->where('user_id', Auth::id())->first();
        // $orders->image = $request->input('image');
        // $orders->update();
        $validatedData = $request->validate([
            'image' => 'image|file',


        ]);
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('uploads');
        }
        $validatedData['order_status'] = "1";
        Order::where('id', $orders->id)
            ->update($validatedData);
        return redirect('/user/my-orders')->with('status', "Terima kasih telah membayar barang belanjaan anda");
    }

    public function addInfo($id)
    {
        $orders = DB::table('orders')->where(function ($query) {
            $query->whereNull('image');
        })->get();
        return view('front.my-order', compact('id', 'orders'));
    }
}
