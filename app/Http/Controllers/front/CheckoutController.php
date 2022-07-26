<?php

namespace App\Http\Controllers\front;

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Regency;
use App\Models\Village;
use App\Models\District;
use App\Models\Province;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\courier;
use Illuminate\Support\Facades\Auth;


class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {

        $cartitems = Cart::where('user_id', Auth::id())->get();
        if($cartitems->isEmpty()) {
            return redirect()->back()->with('status', 'Belum ada barang di keranjang');
        } 
        foreach ($cartitems as $cart) {
            if (!Product::where('id', $cart->product_id)->where('stock', '>=', $cart->quantity)->exists()) {
                $removeItem = Cart::where('user_id', Auth::id())->where('product_id', $cart->product_id)->first();
                $removeItem->delete();
            }
            $cartitems = Cart::where('user_id', Auth::id())->get();
        }
        return view('front.checkout', [
            "title" => "Pangkalan Gas Maisyaroh | Checkout",
            "active" => "checkout",
            "judul" => "Checkout",
            "cartitems" => $cartitems,
            "users" => User::where('id', auth()->user()->id)->get(),
            "provinces" => Province::all(),
            "regencies" => Regency::all()


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

        // $user_id = Auth::id();
        // $user = User::find($user_id);
        //buatt order
        /*payment status = 0 (pending)
            1 = pembayaran diterima
            2 - cancel
            */
        $tracking = rand(1111, 9999);
        $order = new Order;
        $order->user_id = Auth::id();
        $order->order_no = 'pgmaisyaroh' . $tracking;
        $order->order_msg = "";
        if($request->pengiriman == '3') {
            $order->payment_mode = "3";
        } elseif($request->pengiriman == '1') {
            $order->payment_mode = "1";
        } elseif($request->pengiriman == '2') {
            $order->payment_mode = "2";
        }
        //$order->payment_mode = "Cash on Delivery";
        $order->payment_id = "";
        $order->payment_status = "0";
        if($request->pengiriman == '4') {
            $order->order_status = "1";
        } else {
            $order->order_status = "0";
        }
        //$order->order_status = "0";
        $order->notification = "0";
        $order->name = $request->input('name');
        $order->addres = $request->input('addres');
        $order->provinces_id = $request->input('province_id');
        $order->regencies_id = $request->input('regency');
        $order->zip_code = $request->input('zip_code');
        $order->phone_number = $request->input('phone_number');
        $order->pengiriman = $request->input('pengiriman');

        //total harga
        $total = 0;
        $cartitems_total = Cart::where('user_id', Auth::id())->get();
        foreach ($cartitems_total as $prod) {
            $total += $prod->product->sell_price * $prod->quantity;
        }
        if($request->pengiriman == '4') {
            $order->total_price = $total;
        } else {
            $order->total_price = $total + 10000;
        }
        $order->total_price = $total;
        $order->save();



        //buat pesanan
        $cartitems = Cart::where('user_id', Auth::id())->get();
        foreach ($cartitems as $cart) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cart->product_id,
                'quantity' => $cart->quantity,
                'price' => $cart->product->sell_price,
            ]);
        }
        $product = Product::where('id', $cart->product_id)->first();
        $product->stock = $product->stock - $cart->quantity;
        $product->update();


        $cartitems = Cart::where('user_id', Auth::id())->get();
        Cart::destroy($cartitems);

        return redirect('/user/my-orders')->with('status', "Terima kasih. Pesanan anda akan kami siapkan");
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
}
