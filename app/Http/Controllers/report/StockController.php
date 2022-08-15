<?php

namespace App\Http\Controllers\report;

use Illuminate\Http\Request;
use App\Models\IncomingProduct;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = Product::all();
        $incomings  = IncomingProduct::all();
        return view('admin.report.stock-report', [
            "title" => "Stock Produk",
            "incomings" => $incomings,
            "products"  => $produk,
            "categories" => Category::all(),
            "brands" => Brand::all()

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function sisastock()
    {
        $products = Product::all();
        $pdf = PDF::loadView('admin.product.report', ['products' => $products]);
        return $pdf->stream('pg-maisyaroh-sisa-stock.pdf');
        //return $pdf->download('pg-maisyaroh-invoice-pelanggan.pdf');

    }

    public function cetaktgl($tglawal, $tglakhir)
    {
        //dd(["Tanggal Awal : " . $tglawal, "Tanggal Akhir:" . $tglakhir]);

        $tanggal = Product::wherebetween('updated_at', [$tglawal, $tglakhir])->get();
        $pdf = PDF::loadView('admin.product.report-tanggal', ['tanggal' => $tanggal]);
        return $pdf->stream('pg-maisyaroh-sisa-stock-pertanggal.pdf');
    }

    public function cetakbrand($id)
    {
       // $brand = (new Product())->groupBy('brand_id', 'name', 'product_code', 'stock','date')->selectRaw('date(created_at) as date ,product_code, name, stock, brand_id as brand')->get();
       //$brand = (new Product())->groupBy('brand_id', 'name', 'product_code', 'stock','date')->selectRaw('date(created_at) as date ,product_code, name, stock, brand_id as brand')->get();
       $merk = Product::find($id)->select('brand_id');
      // $merk = Product::select('brand_id', 'name', 'product_code', 'stock')->groupBy('brand_id','name', 'product_code', 'stock')->get();
       //$brand = Product::select('brand_id')->pluck('name');
        $pdf = PDF::loadView('admin.product.report-brand', ['brands' => $merk]);
        return $pdf->stream('pg-maisyaroh-sisa-stock-brand.pdf');
    
    }

    public function cetakkategori($category)
    {
        $category = Product::where('category_id', [$category])->get();
        $pdf = PDF::loadView('admin.product.report-kategori', ['category' => $category]);
        return $pdf->stream('pg-maisyaroh-sisa-stock-kategori.pdf');
    }
}
