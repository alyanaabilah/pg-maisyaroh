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
            "title" => "Order User",
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
                "title" => "Detail Pesanan User",
                "order" => $orders
            ]);
        } else {

            return redirect()->back()->with('danger', "Pesanan Tidak Ditemukan");
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     if(Order::find($id)->exists())
    //     {
    //         $order = Order::find($id);
    //         return view('admin.order.status-order', [
    //             "title" => "Status Pesanan User",
    //             "order" => $order
    //         ]);
    //     } else {

    //         return redirect()->back()->with('danger', "Pesanan Tidak Ditemukan");
    //     }
        
    // }

    // public function trackingstatus(Request $request, $id)

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
        // $order = Order::find($id);
        // $order->payment_status = "0";
        // $order->save();
        // return redirect()->back()->with('delete', 'Batal Terima Pembayaran');
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

    public function approve($id) {
        $order = Order::find($id);
        $order->payment_status = "2";
        $order->save();
        return redirect()->back()->with('success', 'Sukses Terima Pembayaran');
    }

    public function reject($id) {
        $order = Order::find($id);
        $order->payment_status = "0";
        $order->order_status = "0";
        $order->save();
        return redirect()->back()->with('success', 'Sukses Tolak Pembayaran');
    }
    
    public function selesai($id) {
        $order = Order::find($id);
        $order->order_status = "1";
        $order->save();
        return redirect()->back()->with('success', 'Pesanan Telah Selesai');
    }
}
