<?php

namespace App\Http\Controllers\report;


use App\Models\laba;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class KeuanganController extends Controller
{
    public function index(Request $request)
    {
        //$terjual = (new OrderItem())->groupBy('product_id', 'order_id', 'date')->selectRaw('sum(quantity) as quantity, product_id, sum(total_price) as total, order_id, date(created_at) as date')->orderBy('created_at', 'desc')
        //->get();
       // $terjual = (new Order())->groupBy('id','total_price', 'date')->selectRaw('date(created_at) as date, sum(total_price) as price, id')->get();
        // $terjual = Order::groupBy('date')->selectRaw('date(created_at) as date,sum(total_price) as total_price')->get();
        $terjual = OrderItem::groupBy('date')->selectRaw('sum(quantity) as quantity, date(created_at) as date, sum(price* quantity) as price')
        ->get();
        // $terjual = DB::table('order_items')
        // ->select(
        //         DB::raw('SUM(order_items.quantity * order_items.price) as price'),
        //          DB::raw('DATE(order_items.created_at)as date'),
        //          DB::raw('COUNT(orders.total_price)as count'),
        //          DB::raw('SUM(order_items.quantity)as quantity')
        // )
        // ->join('orders','orders.id','=','order_items.order_id')
        // ->join('users','users.id','=','orders.user_id')
        // ->groupBy('date')
        // ->get();
        //dd($terjual);
        return view('admin.keuangan.index-keuangan',[
            "title" => "Laporan Penjualan",
            "penjualan" => $terjual
        ]);
    }

    public function show($id)
    {
        if (OrderItem::where('id', $id)->first()) {
            $orders = OrderItem::find($id);
            return view('admin.keuangan.keuangan-show', [
                "title" => "Detail Laporan",
                "order" => $orders
            ]);
        } else {

            return redirect()->back()->with('status', "Order Tidak Ditemukan");
        }
    }

    public function cetakkeuangan()
    {
        
    }
}
