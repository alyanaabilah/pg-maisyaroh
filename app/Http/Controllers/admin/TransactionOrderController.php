<?php

namespace App\Http\Controllers\admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use Barryvdh\DomPDF\Facade\Pdf;

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

    public function transaksi()
    {
        $pesanan = OrderItem::all();
        $pdf = PDF::loadView('admin.dashboard.transaction-report', ['orders' => $pesanan]);
        return $pdf->stream('pg-maisyaroh-transaksi-pelanggan.pdf');
        //return $pdf->download('pg-maisyaroh-invoice-pelanggan.pdf');

    }
    public function tgltransaksi($tglawal, $tglakhir)
    {
        $tanggal = OrderItem::wherebetween('created_at', [$tglawal, $tglakhir])->get();
        $pdf = PDF::loadView('admin.dashboard.transdate-report', ['orders' => $tanggal]);
        return $pdf->stream('pg-maisyaroh-transaksi-tanggal-pelanggan.pdf');
        //return $pdf->download('pg-maisyaroh-invoice-pelanggan.pdf');

    }
}
