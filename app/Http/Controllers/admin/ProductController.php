<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        return view('admin.product.index-product', [
            "title" => "Product",
            "products" => $product
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create-product', [
            "title" => "Tambah Product",
            "categories" => Category::all(),
            "brands" => Brand::all()
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
            'product_code' => 'required|string',
            'name' => 'required|string',
            'category_id' => 'required',
            'brand_id' => 'required',
            // 'stock' => 'required',
            'sell_price' => 'required|integer',
            'sales_price' => 'required|integer',
            'slug' => 'required|max:50|string|unique:products',
            'image' => 'image|file',
            'description' => 'required'
        ]);
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('uploads');
        }

        Product::create($validatedData);
        return redirect('admin/product')->with('success', 'Product Baru Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.product.edit-product', [
            "title" => "Edit Product",
            "product" => $product,
            "categories" => Category::all(),
            "brands" => Brand::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $rules = [
            'product_code' => 'required|string',
            'name' => 'required|string',
            'category_id' => 'required',
            'brand_id' => 'required',
            // 'stock' => 'required',
            'sell_price' => 'required|integer',
            'sales_price' => 'required|integer',
            'description' => 'required'
        ];
        if ($request->slug != $product->slug) {
            $rules['slug'] = 'required|max:50|string|unique:products';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('uploads');
        }
        Product::where('id', $product->id)
            ->update($validatedData);
        return redirect('admin/product')->with('update', 'Berhasil Edit Product!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::delete($product->image);
        }
        Product::destroy($product->id);
        return redirect('admin/product')->with('delete', 'Berhasil Hapus Product!');
    }
}
