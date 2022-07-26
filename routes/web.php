<?php

use App\Models\Brand;
use App\Models\Order;
use App\Models\Category;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\front\CartController;
use App\Http\Controllers\front\ShopController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\report\StockController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\front\ContactController;
use App\Http\Controllers\front\MyOrderController;
use App\Http\Controllers\front\ServiceController;
use App\Http\Controllers\attribut\BrandController;
use App\Http\Controllers\front\CheckoutController;
use App\Http\Controllers\front\PayOrderController;
use App\Http\Controllers\front\UserHomeController;
use App\Http\Controllers\report\WilayahController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\OrderItemController;
use App\Http\Controllers\front\MyProfileController;
use App\Http\Controllers\report\KeuanganController;
use App\Http\Controllers\admin\BestSellerController;
use App\Http\Controllers\admin\PermintaanController;
use App\Http\Controllers\report\UserLoyalController;
use App\Http\Controllers\attribut\CategoryController;
use App\Http\Controllers\report\CouponUserController;
use Illuminate\Foundation\Console\StorageLinkCommand;
use App\Http\Controllers\front\SubsidiCouponController;
use App\Http\Controllers\repoprt\CetakPesananController;
use App\Http\Controllers\admin\IncomingProductController;
use App\Http\Controllers\admin\TransactionOrderController;
use App\Http\Controllers\coba\PegawaiCobaController;
use App\Http\Controllers\penugasan\DataKendaraanController;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });



Route::resource('shop', ShopController::class);
Route::resource('/', UserHomeController::class);
Route::resource('service', ServiceController::class);
Route::resource('contact', ContactController::class);
Route::resource('cart', CartController::class);
//Route::resource('front-category', FrontCategoryController::class);
Route::get('/front-category/{category:slug}', function (Category $category) {
    return view('front.attribut.category-userfront', [
        "title" => "Pangkalan Gas Maisyaroh | Kategori",
        "category" => $category->name,
        "product" => $category->product,
        "active" => "Category",
        "judul" => "Kategori " . $category->name
    ]);
});

Route::get('/front-brand/{brand:name}', function (Brand $brand) {
    return view('front.attribut.brand-userfront', [
        "title" => "Pangkalan Gas Maisyaroh | Brand",
        "brand" => $brand->name,
        "product" => $brand->product,
        "active" => "Brand",
        "judul" => "Brand " . $brand->name,
    ]);
});




Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/store', [RegisterController::class, 'store'])->name('store');


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('authenticate');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');





Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::group(['middleware' => ['ceklevel:admin']], function () {
        Route::resource('shop', ShopController::class)->except('store');
        Route::resource('home', UserHomeController::class);
        Route::resource('service', ServiceController::class);
        Route::resource('contact', ContactController::class);
        Route::get('cart', [CartController::class, 'index']);
        Route::get('checkout', [CheckoutController::class, 'index']);
        Route::get('front-category/{category:slug}', function (Category $category) {
            return view('front.attribut.category-userfront', [
                "title" => "Pangkalan Gas Maisyaroh | Kategori",
                "category" => $category->name,
                "product" => $category->product,
                "active" => "Category",
                "judul" => "Kategori " . $category->name
            ]);
        });
        Route::get('/front-brand/{brand:name}', function (Brand $brand) {
            return view('front.attribut.brand-userfront', [
                "title" => "Pangkalan Gas Maisyaroh | Brand",
                "brand" => $brand->name,
                "product" => $brand->product,
                "active" => "Brand",
                "judul" => "Brand " . $brand->name,
                "brand" => Brand::all(),
                "kategori" => Category::all()
            ]);
        });

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::resource('category', CategoryController::class)->except('show');
        Route::resource('brand', BrandController::class)->except('show');
        Route::resource('product', ProductController::class);
        Route::resource('user', UserController::class)->except('show');
        Route::resource('incoming-product', IncomingProductController::class)->except('show');
        Route::resource('order-item', OrderItemController::class);
        Route::resource('orders', OrderController::class);
        Route::resource('coupon', CouponController::class);
        Route::resource('subsidi-kupon', CouponUserController::class);
        Route::resource('stock', StockController::class);
        Route::resource('best-seller', BestSellerController::class);
        Route::resource('transaction-orders', TransactionOrderController::class);
        Route::get('user-loyal', [UserLoyalController::class, 'userloyal'])->name('cetak.user');
        Route::get('wilayah-terbanyak', [WilayahController::class, 'wilayah'])->name('cetak.wilayah');
        Route::resource('keuangan-laporan',KeuanganController::class);
        Route::resource('pesanan-barang',PermintaanController::class);
        Route::get('laporan-barang',[CetakPesananController::class, 'index']);
        Route::get('/orders/{id}/approve', [OrderController::class, 'approve'])->name('orders.approve');
        Route::get('/orders/{id}/reject', [OrderController::class, 'reject'])->name('orders.reject');
        Route::get('/orders/{id}/selesai', [OrderController::class, 'selesai'])->name('orders.selesai');
        //Route::resource('pegawai-coba', PegawaiCobaController::class);
        Route::resource('data-kendaraan', DataKendaraanController::class);
        
        // Route::get('/generate-invoice/{order:id}', function (Order $order) {
        //     return view('admin.report.invoice-order', [
        //         "title" => "Pangkalan Gas Maisyaroh | Invoice",
        //         "order" => $order->id,
        //         "active" => "Brand"
        //     ]);
        // });
    });
});

//add-to-cart mandiri
Route::post('add-to-cart', [ShopController::class, 'store']);
Route::post('delete-cart-item', [CartController::class, 'destroy']);
Route::post('update-cart-item', [CartController::class, 'update']);

Route::post('user-provinces', [MyProfileController::class, 'store']);
Route::post('user-regencies', [MyProfileController::class, 'getRegencies']);
Route::post('user-districts', [MyProfileController::class, 'getDistricts']);


//PDF
Route::get('/cetak-invoice/{order:id}', [OrderController::class, 'invoice'])->name('cetak.invoice');
//STOCK
//Route::get('/cetak-stock/{tglawal}/{tglakhir}/{brand}/{category}', [StockController::class, 'sisastock'])->name('cetak.stock');
Route::get('/cetak-stock', [StockController::class, 'sisastock'])->name('cetak.stock');
Route::get('/cetak-tanggal/{tglawal}/{tglakhir}', [StockController::class, 'cetaktgl'])->name('cetak.tanggal');
Route::get('/cetak-brand/{brand:id}', [StockController::class, 'cetakbrand'])->name('cetak.brand');
Route::get('/cetak-kategori/{category:id}', [StockController::class, 'cetakkategori'])->name('cetak.kategori');
//TERLARIS
Route::get('/cetak-terlaris', [BestSellerController::class, 'terlaris'])->name('cetak.terlaris');
Route::get('/terlaris-tanggal/{tglawal}/{tglakhir}', [BestSellerController::class, 'cetaktgl'])->name('cetak.tanggal');
Route::get('/terlaris-brand/{brand:id}', [BestSellerController::class, 'cetakbrand'])->name('cetak.brand');
Route::get('/terlaris-kategori/{category:id}', [BestSellerController::class, 'cetakkategori'])->name('cetak.kategori');
//USER-LOYAL
Route::get('/cetak-user-loyal', [UserLoyalController::class, 'cetakuser'])->name('cetak.user');
Route::get('/cetak-user-tanggal/{tglawal}/{tglakhir}', [UserLoyalController::class, 'usertgl'])->name('cetak.usertgl');
//WILAYAH-TERBANYAK
Route::get('/cetak-wilayah-terbanyak', [WilayahController::class, 'wilayahcetak'])->name('cetak.wlayah');
Route::get('/cetak-wilayah-tanggal/{tglawal}/{tglakhir}', [WilayahController::class, 'wilayahtgl'])->name('cetak.wlayahtgl');
//TRANSAKSI
Route::get('/cetak-transaksi', [TransactionOrderController::class, 'transaksi'])->name('cetak.transaksi');
Route::get('/transaksi-tanggal/{tglawal}/{tglakhir}', [TransactionOrderController::class, 'tgltransaksi'])->name('cetak.tgltransaksi');
//REQUEST-SALES
Route::get('pesanan-brand/{brand:id}',[CetakPesananController::class, 'cetakbrand']);
Route::get('/cetak-kendaraan',[DataKendaraanController::class, 'cetak']);
//KEUANGAN
Route::get('/cetak-keuangan-tanggal/{tglawal}/{tglakhir}', [KeuanganController::class, 'keuangantgl'])->name('cetak.tgl');

// Route::post('/terlaris-brand/{brand:name}', function (Brand $brand) {
//     $terjual= (new OrderItem())->groupBy('product_id', 'price')->selectRaw('sum(quantity) as quantity, product_id, price')->orderBy('quantity', 'desc')->where('product_id',$brand->input('brand_id'))
//             ->get();
//     $pdf = PDF::loadView('admin.dashboard.terlaris-brand', ['brand' => $terjual]);
//         return $pdf->stream('pg-maisyaroh-sisa-stock-brand.pdf');
    
// });


// Route::get('/front-brand/{brand:name}', function (Brand $brand) {
//     return view('front.attribut.brand-userfront', [
//         "title" => "Pangkalan Gas Maisyaroh | Brand",
//         "brand" => $brand->name,
//         "product" => $brand->product,
//         "active" => "Brand",
//         "judul" => "Brand " . $brand->name,
//     ]);
// });


//search
Route::get('product-list', [UserHomeController::class, 'productlistAjax']);
Route::post('search-product', [UserHomeController::class, 'searchproduct'])->name('search.products');

// Route::get('province', [Controller::class, 'get_province'])->name('province');
// Route::get('/kota/{id}', [CheckoutController::class, 'get_city']);
// Route::get('/origin={province_origin}&destination={city_destination}&weight={weight}&courier={courier}', [CheckoutController::class, 'get_ongkir']);





Route::group(['prefix' => 'user', 'middleware' => ['auth']], function () {
    Route::group(['middleware' => ['ceklevel:user']], function () {
        Route::resource('shop', ShopController::class);
        Route::resource('home', UserHomeController::class);
        Route::resource('service', ServiceController::class);
        Route::resource('contact', ContactController::class);
        Route::get('cart', [CartController::class, 'index']);
        Route::resource('my-profile', MyProfileController::class);
        // Route::get('/my-profile/{users:id}/edit', [MyProfileController::class, 'edit']);
        // Route::post('/my-profile-update', [MyProfileController::class, 'update'])->name('update.profil');
        Route::resource('checkout', CheckoutController::class);
        Route::resource('my-orders', MyOrderController::class);
        Route::get('my-orders/{id}/addinfo', [MyOrderController::class, 'addinfo']);
        //  Route::get('pay-orders/{order:id}', [PayOrderController::class, 'show']);
        Route::get('/my-orders/{id}/complete', [MyOrderController::class, 'complete'])->name('orders.complete');

        Route::get('/front-category/{category:slug}', function (Category $category) {
            return view('front.attribut.category-userfront', [
                "title" => "Pangkalan Gas Maisyaroh | Kategori",
                "category" => $category->name,
                "product" => $category->product,
                "active" => "Category",
                "judul" => "Kategori " . $category->name,
            ]);
        });
        Route::get('/front-brand/{brand:name}', function (Brand $brand) {
            return view('front.attribut.brand-userfront', [
                "title" => "Pangkalan Gas Maisyaroh | Brand",
                "brand" => $brand->name,
                "product" => $brand->product,
                "active" => "Brand",
                "judul" => "Brand " . $brand->name,
                "product" => Product::all(),
                // "kategori" => Category::all()
            ]);
        });
    });
});



Route::group(['prefix' => 'subsidi', 'middleware' => ['auth']], function () {
    Route::group(['middleware' => ['ceklevel:subsidi']], function () {
        Route::resource('shop', ShopController::class);
        Route::resource('home', UserHomeController::class);
        Route::resource('service', ServiceController::class);
        Route::resource('contact', ContactController::class);
        Route::get('cart', [CartController::class, 'index']);
        Route::get('/my-profile', [MyProfileController::class, 'index']);
        Route::get('/my-profile/{id}/edit', [MyProfileController::class, 'edit']);
        Route::post('/my-profile-update', [MyProfileController::class, 'update'])->name('update.profil');
        Route::resource('checkout', CheckoutController::class);
        Route::resource('my-orders', MyOrderController::class);
        Route::resource('coupon', SubsidiCouponController::class);

        Route::get('/front-category/{category:slug}', function (Category $category) {
            return view('front.attribut.category-userfront', [
                "title" => "Pangkalan Gas Maisyaroh | Kategori",
                "category" => $category->name,
                "product" => $category->product,
                "active" => "Category",
                "judul" => "Kategori " . $category->name
            ]);
        });
        Route::get('/front-brand/{brand:name}', function (Brand $brand) {
            return view('front.attribut.brand-userfront', [
                "title" => "Pangkalan Gas Maisyaroh | Brand",
                "brand" => $brand->name,
                "product" => $brand->product,
                "active" => "Brand",
                "judul" => "Brand " . $brand->name,
            ]);
        });
    });
});


// Route::get('/create-category', [CategoryController::class, 'create'])->name('admin.create-kategori');
// Route::post('/save-category', [CategoryController::class, 'store'])->name('admin.save-kategori');
// Route::get('/home', [AdminController::class, 'index'])->name('admin.home');
// Route::get('/shop', [AdminController::class, 'shop'])->name('admin.shop');
// Route::get('/service', [AdminController::class, 'service'])->name('admin.service');
// Route::get('/contact', [AdminController::class, 'contact'])->name('admin.contact');
// Route::get('/cart', [AdminController::class, 'cart'])->name('admin.cart');
