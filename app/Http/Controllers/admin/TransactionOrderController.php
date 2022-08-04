<?php

namespace App\Http\Controllers\admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OrderItem;

class TransactionOrderController extends Controller
{
    public function index()
    {
        $order = OrderItem::all();
        return view('admin.transaction.transaction-index', [
            "title" => "Transaksi Penjualan Barang",
            "orders" => $order
        ]);
    }
}
