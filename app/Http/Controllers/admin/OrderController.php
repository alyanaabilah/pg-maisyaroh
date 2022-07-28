<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Order::all();
        return view('admin.order.index-order', [
            "title" => "Penjualan Barang",
            "orders" => $order
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
        if (Order::where('id', $id)->first()) {
            $orders = Order::find($id);
            return view('admin.order.order-show', [
                "title" => "Penjualan Barang",
                "order" => $orders
            ]);
        } else {

            return redirect()->back()->with('status', "Order Tidak Ditemukan");
        }
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

    public function invoice($id)
    {
        if (Order::where('id', $id)->first()) {
            $orders = Order::find($id);
            //return view('admin.report.invoice-order');
            //     //     "order" => $orders
            //     // ]);
            $data = [
                'order' => $orders,
            ];
            $pdf = PDF::loadView('admin.report.invoice-order', $data);
            return $pdf->stream('pg-maisyaroh-invoice-pelanggan.pdf');
            //return $pdf->download('pg-maisyaroh-invoice-pelanggan.pdf');
        } else {
            return redirect()->back()->with('status', "Tidak ada order");
        }
    }
}
