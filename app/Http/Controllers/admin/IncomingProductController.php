<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\IncomingProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class IncomingProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incomings  = IncomingProduct::all();
        return view('admin.incoming.index-incoming', [
            "title" => "Product Masuk",
            "incomings" => $incomings

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.incoming.create-incoming', [
            "title" => "Tambah Product Masuk",
            "products" => Product::all(),

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
            'product_id' => 'required',
            'quantity' => 'required|integer',

        ]);


        IncomingProduct::create($validatedData);

        $product = Product::find($request->product_id);
        $product->stock += $request->quantity;
        $product->save(); //untuk membuat quantity di produk masuk menambahkan stok yg ada di product

        return redirect('admin/incoming-product')->with('success', 'Product Masuk Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\IncomingProduct  $incomingProduct
     * @return \Illuminate\Http\Response
     */
    public function show(IncomingProduct $incomingProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\IncomingProduct  $incomingProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(IncomingProduct $incomingProduct)
    {
        return view('admin.incoming.edit-incoming', [
            "title" => "Edit Product Masuk",
            "incoming" => $incomingProduct,
            "products" => Product::all(),

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\IncomingProduct  $incomingProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IncomingProduct $incomingProduct)
    {
        $rules = [
            'product_id' => 'required',
            'quantity' => 'required|integer'

        ];
        $validatedData = $request->validate($rules);

        $product = Product::find($request->product_id);
        $product->stock = $request->quantity;
        $product->save();

        IncomingProduct::where('id', $incomingProduct->id)
            ->update($validatedData);
        return redirect('admin/incoming-product')->with('update', 'Berhasil Edit Product Masuk!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IncomingProduct  $incomingProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(IncomingProduct $incomingProduct)
    {
        IncomingProduct::destroy($incomingProduct->id);
        return redirect('admin/incoming-product')->with('delete', 'Berhasil Hapus Product Masuk!');
    }
}
