<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\StokBahanBakuController;
use App\Http\Controllers\MasterDataController;
use App\Http\Controllers\OmsetContoller;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\ShipmentController;
use App\Http\Controllers\Admin\ReportController;


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


Route::post('payments/notification', [\App\Http\Controllers\PaymentController::class, 'notification'])->name('payment.notification');
Route::get('payments/completed', [\App\Http\Controllers\PaymentController::class, 'completed'])->name('payment.completed');
Route::get('payments/failed', [\App\Http\Controllers\PaymentController::class, 'failed'])->name('payment.failed');
Route::get('payments/unfinish', [\App\Http\Controllers\PaymentController::class, 'unfinish'])->name('payment.unfinish');

Route::get('text', function() {
    return view('frontend.payments.success');
});

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('homepage');

Route::get('search', [\App\Http\Controllers\ShopController::class, 'search'])->name('search');
Route::get('shop/{slug?}', [\App\Http\Controllers\ShopController::class, 'index'])->name('shop.index');
Route::get('shop/tag/{slug}', [\App\Http\Controllers\ShopController::class, 'tag'])->name('shop.tag');
Route::get('product/{slug}', [\App\Http\Controllers\ProductController::class, 'show'])->name('product.show');

Route::resource('favorite', \App\Http\Controllers\FavoriteController::class)->only(['index','store','destroy']);
Route::resource('cart', \App\Http\Controllers\CartController::class)->only(['index','store','update', 'destroy']);


Route::group(['middleware' => 'auth'], function() {

    Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('orders/checkout', [OrderController::class, 'process'])->name('checkout.process');
    Route::get('orders/cities', [OrderController::class, 'cities']);
    Route::post('orders/shipping-cost', [OrderController::class, 'shippingCost']);
    Route::post('orders/set-shipping', [OrderController::class, 'setShipping']);
    Route::post('orders/checkout', [OrderController::class, 'checkout'])->name('checkout');
    Route::get('orders/received/{orderId}', [OrderController::class, 'received'])->name('checkout.received');
    Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('orders/{orderId}', [OrderController::class, 'show'])->name('orders.show');



    // Auth::routes();

    // Route::get('/admin', function () {
    //     return view('admin.index');
    // })->middleware('auth');

    // // Route::get('/home', function () {
    // //     return view('admin.index');
    // // })->middleware('auth');


Route::group(['middleware' => 'isAdmin','prefix' => 'admin', 'as' => 'admin.'], function() {

    Route::get('dashboard', 'DashboardController@index')->name('admin.index');



    // ROLES
    Route::resource('roles', 'RoleController');
    Route::resource('permissions', 'PermissionController');
    Route::resource('users', 'UserController');


    Route::get('/logout', 'Auth\LoginController@logout');

    // CRUD ORDERAN //
    Route::get('/input_orderan', 'OrderController@index');
    Route::POST('/input_orderan', 'OrderController@store');
    Route::get('/lihat_orderan', 'OrderController@lihat_orderan');
    Route::get('/lihat_orderan/detail/{id}', 'OrderController@show');
    Route::get('/edit_orderan/{id}', 'OrderController@edit');
    Route::PATCH('/edit_orderan/{id}', 'OrderController@update');

    //CRUD STOK BARANG //
    Route::get('/stok', 'StokController@index');
    Route::get('/show_stok/{id}', 'StokController@show');
    Route::get('/print_stok/{nama_loker}', 'StokController@print_stok');

    //CRUD STOK BAHAN BAKU //
    Route::get('/stok_bahan_baku', 'StokBahanBakuController@index');
    Route::get('/show_stok_bahan_baku/{id}', 'StokBahanBakuController@show_stok_bahan_baku');
    Route::get('/print_stok_bahan_baku/{nama_loker_bahan}', 'StokBahanBakuController@print_stok_bahan_baku');

    //CRUD MASTER DATA STOK BARANG//
    Route::get('/master_stok', 'MasterDataController@master_stok');
    Route::get('/lihat_stok/{nama_loker}', 'MasterDataController@show_stok');
    Route::POST('/input_master_stok', 'MasterDataController@input_master_stok');
    Route::get('/edit_stok/{id}', 'MasterDataController@edit_stok');
    Route::PATCH('/edit_stok/{id}', 'MasterDataController@update_stok');
    Route::get('/hapus_stok/{id}', 'MasterDataController@destroy_stok');

    //CRUD MASTER DATA STOK BAHAN BAKU//
    Route::get('/master_stok_bahan_baku', 'MasterDataController@master_stok_bahan_baku');
    Route::get('/lihat_stok_bahan_baku/{nama_loker_bahan}', 'MasterDataController@show_stok_bahan_baku');
    Route::POST('/input_master_stok_bahan_baku', 'MasterDataController@input_master_stok_bahan_baku');
    Route::get('/edit_stok_bahan_baku/{id}', 'MasterDataController@edit_stok_bahan_baku');
    Route::PATCH('/edit_stok_bahan_baku/{id}', 'MasterDataController@update_stok_bahan_baku');
    Route::get('/hapus_stok_bahan_baku/{id}', 'MasterDataController@destroy_stok_bahan_baku');

    //CRUD MASTER DATA ORDERAN
    Route::get('/master_orderan', 'MasterDataController@master_orderan');
    Route::get('/orderan/hapus_orderan/{id}', 'MasterDataController@destroy_orderan');

    //CRUD MASTER DATA ACCOUNT
    Route::get('/master_akun', 'MasterDataController@master_akun');
    Route::get('/master_akun/edit/{id}', 'MasterDataController@edit_akun');
    Route::get('/master_akun/hapus_akun/{id}', 'MasterDataController@destroy_akun');
    Route::PATCH('/master_akun/update/{id}', 'MasterDataController@update_akun');
    Route::PATCH('/master_akun/update_pw/{id}', 'MasterDataController@update_pw');
    Route::post('/master_akun/add', 'MasterDataController@add_akun');

    //CRUD MASTER DATA SUPPLIER
    Route::get('/master_supplier', 'MasterDataController@master_supplier');
    Route::get('/master_supplier/edit/{id}', 'MasterDataController@edit_supplier');
    Route::get('/master_supplier/hapus_supplier/{id}', 'MasterDataController@destroy_supplier');
    Route::PATCH('/master_supplier/update/{id}', 'MasterDataController@update_supplier');
    Route::post('/master_supplier/add', 'MasterDataController@add_supplier');


    //CRUD MASTER DATA PEGAWAI
    Route::get('/master_pegawai', 'MasterDataController@master_pegawai');
    Route::get('/master_pegawai/edit/{id}', 'MasterDataController@edit_pegawai');
    Route::get('/master_pegawai/hapus_pegawai/{id}', 'MasterDataController@destroy_pegawai');
    Route::PATCH('/master_pegawai/update/{id}', 'MasterDataController@update_pegawai');
    Route::post('/master_pegawai/add', 'MasterDataController@add_pegawai');


    //ORDERAN BELUM DI PROSES
    Route::get('/orderan/belum_proses', 'OrderController@belum_proses');

    //ORDERAN MULAI PRODUKSI
    Route::get('/on_proses', 'OrderController@on_proses');
    Route::get('/orderan/mulai_produksi/{id}', 'OrderController@mulai_produksi');

    //ORDERAN SIAP KIRIM //
    Route::get('/orderan/selesai_produksi/{id}', 'OrderController@selesai_produksi');
    Route::get('/siap_kirim', 'OrderController@siap_kirim');

    // ORDERAN SELESAI //
    Route::get('/orderan/selesai_produksi', 'OrderController@selesai_produksi');
    Route::get('/orderan_selesai', 'OrderController@orderan_selesai');

    //CETAK INVOICE
    Route::get('/orderan/cetak_invoice/{id}', 'OrderController@cetak_invoice');

    //OMSET BULANAN
    Route::get('/omset_bulanan', 'OmsetContoller@index');
    Route::POST('/omset_bulanan', 'OmsetContoller@cari_omset');
    //OMSET TAHUNAN
    Route::get('/omset_tahunan', 'OmsetContoller@omset_tahunan');
    Route::POST('/omset_tahunan', 'OmsetContoller@cari_omset_tahunan');

    // PROFILE
    // Route::get('/profile/{id}', 'AkunController@index');
    // Route::PATCH('/update_profile/{id}', 'AkunController@update');
    // Route::PATCH('/update_profile/update_pw/{id}', 'AkunController@update_pw');

});

});

Auth::routes();