<?php

namespace App\Http\Controllers\report;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class UserLoyalController extends Controller
{
    public function userloyal()
    {
        $user = (new Order())->groupBy('user_id', 'total_price')->selectRaw('count(user_id) as most_orders, user_id, total_price')->orderBy('most_orders', 'desc')->get();
        return view('admin.dashboard.user-order',[
            "title" => "User Terloyal",
            "users" => $user
        ]);
    }

    public function cetakuser()
    {
        $order = (new Order())->groupBy('user_id', 'total_price', 'date')->selectRaw('count(user_id) as most_orders, user_id, date(created_at) as date, total_price')->orderBy('most_orders', 'desc')->get();
        $pdf = PDF::loadView('admin.dashboard.user-all-report', ['user' => $order]);
        return $pdf->stream('pg-maisyaroh-user-terbanyak-membeli.pdf');
        //return $pdf->download('pg-maisyaroh-invoice-pelanggan.pdf');
    }

    public function usertgl($tglawal, $tglakhir)
    {
        //dd(["Tanggal Awal : " . $tglawal, "Tanggal Akhir:" . $tglakhir]);

        $tanggal = (new Order())->groupBy('user_id', 'total_price', 'date')->selectRaw('count(user_id) as most_orders, user_id, date(created_at) as date, total_price')->orderBy('most_orders', 'desc')->wherebetween('created_at', [$tglawal, $tglakhir])->get();
        $pdf = PDF::loadView('admin.dashboard.user-tanggal', ['tanggal' => $tanggal]);
        return $pdf->stream('pg-maisyaroh-wilayah-terbanyak-pertanggal.pdf');
    }
}
