<?php

namespace App\Http\Controllers\admin;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Permintaan;

class PermintaanController extends Controller
{
    public function index()
    {
        $permintaan = Permintaan::all();
        return view('admin.permintaan.index-permintaan', [
            "title" => "Pesanan Barang",
            "sales" => $permintaan
        ]);
    }

    public function create()
    {
        return view('admin.permintaan.create-permintaan', [
            "title" => "Tambah Pesanan",
            "products" => Product::all(),
            "brands" => Brand::all()
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_id' => 'required',
            'brand_id' => 'required',
            'kebutuhan' => 'required|string'
        ]);

        Permintaan::create($validatedData);
        return redirect('admin/pesanan-barang')->with('success', 'Permintaan Barang Telah Ditambahkan');
    }

    public function edit(Request $request, $id)
    {
        $permintaan = Permintaan::find($id);
        return view('admin.permintaan.edit-permintaan', [
            "title" => "Edit Pesanan",
            "items" => $permintaan,
            "products" => Product::all(),
            "brands" => Brand::all()
        ]);
    }

    public function update(Request $request, $id)
    {
        $permintaan = Permintaan::find($id);

        $rules = [
            'product_id' => 'required',
            'brand_id' => 'required',
            'kebutuhan' => 'required|string'
        ];
        $validatedData = $request->validate($rules);
        Permintaan::where('id', $permintaan->id)
                    ->update($validatedData);
        return redirect('admin/pesanan-barang')->with('update', 'Permintaan Barang Telah Diubah');
    }

    public function destroy($id)
    {
        //$permintaan = Permintaan::find($id);
        Permintaan::destroy($id);
        return redirect('admin/pesanan-barang')->with('delete', 'Berhasil Hapus Permintaan Barang!');
    }
}
