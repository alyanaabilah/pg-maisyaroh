<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PdfController extends Controller
{
    public function generatePdf(Request $request)
    {
        // $data['titile'] = "Pangkalan Gas Maisyaroh";
        // $data['content'] = "Laporan";

        // $pdf = PDF::loadView('admin.report.invoice-order', $data);

        // return $pdf->download('pg-maisyaroh.pdf');
    }

    //     public function invoice($id)
    //     {
    //         //     // if (Order::where('id', $id)->first()) {
    //         //     //     $orders = Order::find($id);
    //         return view('admin.report.invoice-order');
    //         //     //     //     "order" => $orders
    //         //     //     // ]);
    //         //     //     $data = [
    //         //     //         'order' => $orders,
    //         //     //     ];
    //         //     //     $pdf = PDF::loadView('admin.report.invoice-order', $data);

    //         //     //     return $pdf->download('pg-maisyaroh.pdf');
    //         //     // } else {
    //         //     //     return redirect()->back()->with('status', "Tidak ada order");
    //         //     // }
    //     }
    // }
}
