<?php

namespace App\Http\Controllers\repoprt;

use App\Models\Permintaan;
//use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Request;
class CetakPesananController extends Controller

{
    public function index()
    {
        $permintaan = Permintaan::all();
        return view('admin.permintaan.index-cetak', [
            "title" => "Surat Pesanan Barang",
            "sales" => $permintaan,
            "brands" => Brand::all()
        ]);
    }

    public function cetakbrand($id)
    {
        $merk = Permintaan::where('brand_id', Request::input('brand_id'))->get();
         $pdf = PDF::loadView('admin.permintaan.cetak-brand', ['brands' => $merk]);
         return $pdf->stream('pg-maisyaroh-pesanan-barang-brand.pdf');
    }
}
