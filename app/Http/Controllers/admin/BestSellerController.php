<?php

namespace App\Http\Controllers\admin;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\OrderItem;
//use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;

class BestSellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = (new OrderItem())->groupBy('product_id', 'price')->selectRaw('sum(quantity) as quantity, product_id, price')->orderBy('quantity', 'desc')
            ->get();
        // $order = OrderItem::query()->leftJoin('order_items', 'price', '=', 'order_items.product_id')->select('quantity', 'price')->selectRaw('count(quantity.order_items) as quantity')->groupBy('order_items.product_id')->get();
        return view('admin.dashboard.best-seller', [
            "title" => "Produk Terlaris",
            "seller" => $order,
            "brand" => Brand::all(),
            "categories" => Category::all()
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

    public function terlaris()
    {
        $order = (new OrderItem())->groupBy('product_id', 'price')->selectRaw('sum(quantity) as quantity, product_id, price')->orderBy('quantity', 'desc')
            ->get();
        $pdf = PDF::loadView('admin.report.terlaris-report', ['orders' => $order]);
        return $pdf->stream('pg-maisyaroh-produk-terlaris.pdf');
        //return $pdf->download('pg-maisyaroh-invoice-pelanggan.pdf');

    }

    public function cetaktgl($tglawal, $tglakhir)
    {
        //dd(["Tanggal Awal : " . $tglawal, "Tanggal Akhir:" . $tglakhir]);


        $tanggal = OrderItem::wherebetween('updated_at', [$tglawal, $tglakhir])->get();
        $pdf = PDF::loadView('admin.report.report-terlaris', ['tanggal' => $tanggal]);
        return $pdf->stream('pg-maisyaroh-terlaris-pertanggal.pdf');
    }

    // public function cetakbrand($id)
    // {
    //     // $terjual= (new OrderItem())->groupBy('product_id', 'price')->selectRaw('sum(quantity) as quantity, product_id, price')->orderBy('quantity', 'desc')->where('product_id',$brand->input('brand_id'))
    //     //     ->get();
    //     $terjual= (new OrderItem())->selectRaw('sum(quantity) as quantity, product_id, price')->where('product_id',Request::input('brand_id', $id))->orderBy('quantity', 'desc')->groupBy('product_id', 'price')
    //         ->get();
    //     // $terjual= (new OrderItem())->groupBy('product_id', 'price')->selectRaw('sum(quantity) as quantity, product_id, price')->orderBy('quantity', 'desc')->where('product_id',Request::input('brand_id', $name))
    //     //     ->get();
    //     //$terjual = Request::input('brand_id', $id);
    //         //dd($terjual)->get();
    //     $pdf = PDF::loadView('admin.dashboard.terlaris-brand', ['brand' => $terjual]);
    //     return $pdf->stream('pg-maisyaroh-sisa-stock-brand.pdf');
    // }

    // public function cetakkategori($category)
    // {
    //     $category = (new OrderItem())->groupBy('product_id', 'price')->selectRaw('sum(quantity) as quantity, product_id, price')->orderBy('quantity', 'desc')->where('product_id',Request::input('category_id', $category))->get();
    //     $pdf = PDF::loadView('admin.dashboard.terlaris-kategori', ["category" => $category]);
    //     return $pdf->stream('pg-maisyaroh-sisa-stock-kategori.pdf');
    // }
}
