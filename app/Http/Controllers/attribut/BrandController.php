<?php

namespace App\Http\Controllers\attribut;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brand = Brand::all();
        return view('admin.attribut.brand.index-brand', [
            "title" => "Brand",
            "brand" => $brand
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.attribut.brand.create-brand', [
            "title" => "Tambah Brand"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:50',
            'sales' => 'required|string|max:50'
        ]);

        Brand::create($validatedData);
        return redirect('admin/brand')->with('success', 'Brand Baru Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('admin.attribut.brand.edit-brand', [
            "title" => "Edit Brand",
            "brand" => $brand
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $rules = [
            'name' => 'required|string|max:50',
            'sales' => 'required|string|max:50'

        ];
        $validatedData = $request->validate($rules);

        Brand::where('id', $brand->id)
            ->update($validatedData);
        return redirect('admin/brand')->with('update', 'Berhasil Edit Brand!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        Brand::destroy($brand->id);
        return redirect('admin/brand')->with('delete', 'Berhasil Hapus Brand!');
    }
}
