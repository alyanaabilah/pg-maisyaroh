<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        return view('front.shop', [
            "title" => "Pangkalan Gas Maisyaroh | Shop",
            "product" => Product::all(),
            "active" => "shop",
            "judul" => "Shop",
            "categories" => Category::all()
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $shop)
    {
        return view('front.shop-detail', [
            "title" => "Pangkalan Gas Maisyaroh | Detail",
            "product" => $shop,
            "active" => "shop",
            "judul" => "Detail Produk",
            "brands" => Brand::all()


        ]);
    }

    public function store(Request $request)
    {
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');

        if (Auth::check()) {
            $prod_check = Product::where('id', $product_id)->first();
            if ($prod_check) {
                if (Cart::where('product_id', $product_id)->where('user_id', Auth::id())->first()) {
                    //session()->flash('status',  $prod_check->name . " Already Added to cart");
                    return response()->json(['status' => $prod_check->name . " Sudah ada di keranjang"]);
                } else {
                    $cartItem = new Cart();
                    $cartItem->product_id = $product_id;
                    $cartItem->user_id = Auth::id();
                    $cartItem->quantity = $product_qty;
                    $cartItem->save();
                    return response()->json(['status' => $prod_check->name . " Ditambahkan ke keranjang"]);
                }
            }
        } else {
            return response()->json(['status' => 'Login to Continue']);
        }
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
