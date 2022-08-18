<?php

namespace App\Http\Controllers\front;

use App\Models\Cart;
use App\Models\User;
use App\Models\Coupon;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$total = User::with('cartWithProductPrice')->find(1);
        $coupon = Coupon::all();
        $cartitems = Cart::where('user_id', Auth::id())->get();
        return view('front.cart', [
            "title" => "Pangkalan Gas Maisyaroh | Cart",
            "active" => "cart",
            "judul" => "Cart",
            "cartitems" => $cartitems,
            "brands" => Brand::all(),
            // "kupon" => $coupon
            //  "total" => $total
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
    public function update(Request $request)
    {
        $product_id = $request->input('product_id');
        $quantity = $request->input('quantity');

        if (Auth::check()) {
            if (Cart::where('product_id', $product_id)->where('user_id', Auth::id())->first()) {
                $cart = Cart::where('product_id', $product_id)->where('user_id', Auth::id())->first();
                $cart->quantity = $quantity;
                $cart->update();
                return response()->json(['status' => "Updated Cart Successfull"]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (Auth::check()) {
            $product_id = $request->input('product_id');
            if (Cart::where('product_id', $product_id)->where('user_id', Auth::id())->first()) {
                $cartItem = Cart::where('product_id', $product_id)->where('user_id', Auth::id())->first();
                $cartItem->delete();
                return response()->json(['status' => "Deleted Sucessfull"]);
            }
        } else {
            return response()->json(['status' => "Login to Continue"]);
        }
    }

    public function cartcount()
    {
        $count = Cart::where('user_id', Auth::id())->count();
        return response()->json(['count' => $count]);
    }
}
