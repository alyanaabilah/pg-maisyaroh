<?php

namespace App\Http\Controllers\report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;

class WilayahController extends Controller
{
    public function wilayah()
    {
        $order = (new Order())->groupBy('user_id', 'total_price', 'date')->selectRaw('count(user_id) as most_orders, user_id, date(created_at) as date, total_price')->orderBy('most_orders', 'desc')->get();
        return view('admin.dashboard.wilayah-order',[
            "title" => "Wilayah Terloyal",
            "wilayah" => $order
        ]);
    }

    public function wilayahcetak()
    {
        $order = (new Order())->groupBy('user_id', 'total_price', 'date')->selectRaw('count(user_id) as most_orders, user_id, date(created_at) as date, total_price')->orderBy('most_orders', 'desc')->get();
        $pdf = PDF::loadView('admin.dashboard.wilayah-all-report', ['wilayah' => $order]);
        return $pdf->stream('pg-maisyaroh-wilayah-terbanyak-membeli.pdf');
        //return $pdf->download('pg-maisyaroh-invoice-pelanggan.pdf');
    }

    public function wilayahtgl($tglawal, $tglakhir)
    {
        //dd(["Tanggal Awal : " . $tglawal, "Tanggal Akhir:" . $tglakhir]);

        $tanggal = (new Order())->groupBy('user_id', 'total_price', 'date')->selectRaw('count(user_id) as most_orders, user_id, date(created_at) as date, total_price')->orderBy('most_orders', 'desc')->wherebetween('created_at', [$tglawal, $tglakhir])->get();
        $pdf = PDF::loadView('admin.dashboard.wilayah-tanggal', ['tanggal' => $tanggal]);
        return $pdf->stream('pg-maisyaroh-sisa-stock-pertanggal.pdf');
    }
}
