<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [HomeController::class, 'index']);


Route::middleware(['auth:sanctum',config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/view_category', [AdminController::class, 'view_category']);
Route::post('/add_category', [AdminController::class, 'add_category']);
Route::get('/delete_category/{id}', [AdminController::class, 'delete_category']);
Route::get('/view_product', [AdminController::class, 'view_product']);
Route::post('/add_product', [AdminController::class, 'add_product']);
Route::get('/show_product', [AdminController::class, 'show_product']);
Route::get('/delete_product/{id}', [AdminController::class, 'delete_product']);
Route::get('/edit_product/{id}', [AdminController::class, 'edit_product']);
Route::post('/edit_product_confirm/{id}', [AdminController::class, 'edit_product_confirm']);
Route::get('/allorder_table', [AdminController::class, 'allorder_table']);
Route::get('/delivered/{id}', [AdminController::class, 'delivered']);
Route::get('/shipped/{id}', [AdminController::class, 'shipped']);
Route::get('/search', [AdminController::class, 'searchdata']);
Route::get('/dashboardadmin', [AdminController::class, 'dashboardadmin']);
Route::get('/customized_order', [AdminController::class, 'customized_order']);
Route::get('order_receipt/{id}', [AdminController::class, 'showOrderReceipt']);
Route::get('/customized_order', [AdminController::class, 'index'])->name('admin.custom_orders');
Route::get('/custom_order_receipt/{id}', [AdminController::class, 'showCustomOrderReceipt']);


Route::get('shipped/{id}/{type}', [AdminController::class, 'shipped']);
Route::get('delivered/{id}/{type}', [AdminController::class, 'delivered']);


Route::get('/redirect', [HomeController::class, 'redirect']);
Route::get('/product_details/{id}', [HomeController::class, 'product_details']);
Route::match(['get', 'post'], '/add_cart/{id}', [HomeController::class, 'add_cart']);
Route::get('/show_cart', [HomeController::class, 'show_cart']);
Route::get('/remove_cart/{id}', [HomeController::class, 'remove_cart']);
Route::get('/order_table', [HomeController::class, 'order_table']);
Route::get('/show_order', [HomeController::class, 'show_order']);
Route::get('/order', [HomeController::class, 'order']);
Route::get('/cancel_order/{id}', [HomeController::class, 'cancel_order']);
Route::get('/order_received/{id}', [HomeController::class, 'order_received']);
Route::get('/product_search', [HomeController::class, 'product_search']);
Route::get('/all_products', [HomeController::class, 'all_products']);
Route::get('/search_all_product', [HomeController::class, 'search_all_product']);
Route::get('/show_order', [HomeController::class, 'showOrder']);
Route::post('/order_table', [HomeController::class, 'order_table']);


Route::get('/product_details2/{id}', [HomeController::class, 'product_details2']);

Route::get('/custom_order', [HomeController::class, 'custom_order']);
Route::post('/store_custom_order', [HomeController::class, 'storeCustomOrder'])->name('store_custom_order');


Route::get('/custom_order', [HomeController::class, 'custom_order'])->name('custom_order');
Route::post('/store_custom_order', [HomeController::class, 'storeCustomOrder'])->name('store_custom_order');
Route::get('/mycustom_order', [HomeController::class, 'showCustomOrder']); // This route seems fine


Route::get('/cakes', [HomeController::class, 'cakes']);
Route::get('/bread', [HomeController::class, 'bread']);
Route::get('/cookies', [HomeController::class, 'cookies']);



