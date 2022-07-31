<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\User;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kupon = Coupon::all();

        return view('admin.coupon.index-coupon', [
            "coupon" => $kupon,
            "title" => "Kupon",


        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.coupon.create-coupon', [
            "title" => "Tambah Kupon",
            // 

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

        $coupon = new Coupon();
        // $coupon->user_id = $request->input('user_id');
        $coupon->coupon_name = $request->input('coupon_name');
        $coupon->coupon_name = $request->input('coupon_type');
        $coupon->coupon_code = $request->input('coupon_code');
        $coupon->coupon_price = $request->input('coupon_price');
        $coupon->start_datetime = $request->input('start_datetime');
        $coupon->end_datetime = $request->input('end_datetime');
        $coupon->status = $request->input('status') == true ? '1' : '0';
        $coupon->save();

        return redirect('admin/coupon')->with('success', 'Data Kupon Telah Ditambahkan');
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
        $coupon = Coupon::find($id);
        return view('admin.coupon.edit-coupon', [
            "title" => "Edit Kupon",
            "coupon" => $coupon,

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
        $coupon = Coupon::find($id);
        $coupon->coupon_code = $request->input('coupon_code');
        $coupon->coupon_name = $request->input('coupon_name');
        $coupon->coupon_type = $request->input('coupon_type');
        $coupon->coupon_price = $request->input('coupon_price');
        $coupon->start_datetime = $request->input('start_datetime');
        $coupon->end_datetime = $request->input('end_datetime');
        $coupon->status = $request->input('status') == true ? '1' : '0';
        $coupon->update();

        return redirect('admin/coupon')->with('success', 'Berhasil Edit Kupon!');
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
}
