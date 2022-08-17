<?php

namespace App\Http\Controllers\report;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class UserLoyalController extends Controller
{
    public function userloyal()
    {
        // $user = (new Order())->groupBy('user_id', 'total_price')->selectRaw('count(user_id) as most_orders, user_id, total_price')->orderBy('most_orders', 'desc')->get();
        $user = DB::table('orders')
                    ->join('users', 'users.id', '=', 'orders.user_id')
                    ->groupBy('users.id')
                    ->get([
                        'users.name AS name',
                        DB::raw('COUNT(users.id) AS most_orders'),
                        DB::raw('SUM(orders.total_price) AS total_price')
                    ]);

        return view('admin.dashboard.user-order',[
            "title" => "User Terloyal",
            "users" => $user
        ]);
    }

    public function cetakuser()
    {
        $user = DB::table('orders')
        ->join('users', 'users.id', '=', 'orders.user_id')
        ->groupBy('users.id')
        ->get([
            'users.name AS name',
            DB::raw('COUNT(users.id) AS most_orders'),
            DB::raw('SUM(orders.total_price) AS total_price')
        ]);
        $pdf = PDF::loadView('admin.dashboard.user-all-report', ['user' => $user]);
        return $pdf->stream('pg-maisyaroh-user-terbanyak-membeli.pdf');
        //return $pdf->download('pg-maisyaroh-invoice-pelanggan.pdf');
    }

//     public function usertgl($tglawal, $tglakhir)
//     {
//         //dd(["Tanggal Awal : " . $tglawal, "Tanggal Akhir:" . $tglakhir]);

//         $tanggal = (new Order())->groupBy('user_id', 'total_price', 'date')->selectRaw('count(user_id) as most_orders, user_id, date(created_at) as date, total_price')->orderBy('most_orders', 'desc')->wherebetween('created_at', [$tglawal, $tglakhir])->get();
//         $pdf = PDF::loadView('admin.dashboard.user-tanggal', ['tanggal' => $tanggal]);
//         return $pdf->stream('pg-maisyaroh-wilayah-terbanyak-pertanggal.pdf');
//     }
 }
