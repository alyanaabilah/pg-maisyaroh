<?php

namespace App\Http\Controllers\penugasan;

use App\Http\Controllers\Controller;
use App\Models\DataKendaraan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class DataKendaraanController extends Controller
{
    public function index()
    {
        return view('admin.penugasan.index-data-kendaraan',[
            "kendaraan" => DataKendaraan::all(),
            "title" => "Data Kendaraan"
        ]);
    }

    public function create()
    {
        return view('admin.penugasan.create-data-kendaraan',[
            "kendaraan" => DataKendaraan::all(),
            "title" => "Data Kendaraan"
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nomor_polisi' => 'required',
            'merk_kendaraan' => 'required',
            'transmisi' => 'required',
            'tahun_pembuatan' => 'required'
        ]);

        DataKendaraan::create($validatedData);
        return redirect('admin/data-kendaraan')->with('success', 'Sukses Tambah Data');
    }

    public function edit($id)
    {
        $kendaraan = DataKendaraan::find($id);
        return view('admin.penugasan.edit-data-kendaraan',[
            "kendaraan" => $kendaraan,

            "title" => "Data Kendaraan"
        ]);
    }

    public function update(Request $request, $id)
    {
        $kendaraan = DataKendaraan::find($id);
        $validatedData = $request->validate([
            'nomor_polisi' => 'required',
            'merk_kendaraan' => 'required',
            "transmisi" => 'required',
            "tahun_pembuatan" => 'required'
        ]);

        DataKendaraan::where('id', $kendaraan->id)
                       ->update($validatedData) ;
        return redirect('admin/data-kendaraan')->with('success', 'Sukses Edit Data');
    } 

    public function destroy($id)
    {
        DataKendaraan::destroy($id);
    }

    public function cetak()
    {
        $cetak = DataKendaraan::all();
        $pdf = PDF::loadView('admin.penugasan.cetak-kendaraan', ['kendaraan' => $cetak]);
         return $pdf->stream('pg-maisyaroh-cetak-kendaraan.pdf');
    }
}
