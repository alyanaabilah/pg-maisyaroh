<?php

namespace App\Http\Controllers\front;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class UserHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // dd(request('search'));
        $order = (new OrderItem())->groupBy('product_id')->selectRaw('sum(quantity) as quantity, product_id')
            ->get();;
        return view('front.home', [
            "title" => "Pangkalan Gas Maisyaroh | Home",
            "product" =>  Product::orderBy('created_at', 'desc')->get(),
            "order" => $order,
            "active" => "home",
            "categories" => Category::all(),
            "brands" => Brand::all(),
            // "home" => $home->get(),

        ]);
    }

    public function productlistAjax()
    {
        $products = Product::select('name')->get();
        $data = [];

        foreach ($products as $item) {
            $data[] = $item['name'];
        }
        return $data;
    }

    public function searchproduct(Request $request)
    {
        $searched = $request->search;
        $user = Auth::user();
        if ($searched != "") {
            $product = Product::where("name", "LIKE", "%$searched%")->first();

            if ($product) {
                if (Auth::check('login')) {
                    if ($user->ceklevel == 'user') {
                        return redirect('user/shop/' . $product->slug);
                    } elseif ($user->ceklevel == 'subsidi') {
                        return redirect('subsidi/shop/' . $product->slug);
                    } else {
                        return redirect('admin/shop/' . $product->slug);
                    }
                } else {
                    return redirect('shop/' . $product->slug);
                }
            } else {
                return redirect()->back()->with("status", "Hasil Tidak Ada");
            }
        } else {
            return redirect()->back();
        }
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
}
