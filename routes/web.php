<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\login_controller;

use App\Http\Controllers\admin_controller;

use App\Http\Controllers\category_controller;

use App\Http\Controllers\product_controller;

use App\Http\Controllers\usersite_controller;

use App\Http\Controllers\userlist_controller;

use App\Http\Controllers\orderhistory_controller;

use App\Http\Controllers\neworder_controller;

use App\Http\Controllers\allocatedorder_controller;

use App\Http\Controllers\confirmorder_controller;

use App\Http\Controllers\cancelorder_controller;

use App\Http\Controllers\payment_controller;

use App\Http\Controllers\gallery_controller;

use App\Http\Controllers\contactno_controller;



// use App\Http\Controllers\bringer_controller;

// use App\Http\Controllers\stockcarrier_controller;

// use App\Http\Controllers\stock_controller;



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

Route::get('/', function () {
    return view('welcome');
});
//web link
Route::get('/usersite',[usersite_controller::class,'index']);
Route::get('/web/category/{id}',[usersite_controller::class,'category']);
Route::get('/web/product',[usersite_controller::class,'product']);
Route::post('/web/product1',[usersite_controller::class,'product1']);
Route::get('/web/login',[usersite_controller::class,'login']);
Route::get('/web/about',[usersite_controller::class,'about']);
Route::get('/web/contact',[usersite_controller::class,'contact']);
Route::post('/web/productdetail',[usersite_controller::class,'product_detail']);
Route::post('/web/logincheck',[usersite_controller::class,'logincheck']);

Route::post('/web/login',[usersite_controller::class,'login']);
Route::get('/createaccount',[usersite_controller::class,'createaccount']);
Route::any('/web/create',[usersite_controller::class,'insertuser']);

Route::post('/searchproduct',[usersite_controller::class,'search']);



Route::post('/web/contactnumber',[contactno_controller::class,'insert']);
Route::get('/contact',[contactno_controller::class,'index']);
Route::get('/contact/status/{id}',[contactno_controller::class,'status']);
Route::get('/contact/dstatus/{id}',[contactno_controller::class,'dstatus']);



Route::get('/login',[login_controller::class,'login']);
Route::post('/login/check',[login_controller::class,'loginchk']);
Route::get('/logout',[login_controller::class,'logout']);


Route::middleware(['preventBackHistory'])->group(function () {

// Route::middleware(['backb'])->group(function(){
// Route::middleware(['userguard'])->group(function(){



// });
// });


Route::get('/web/profile',[usersite_controller::class,'myprofile']);
Route::get('/web/logout',[usersite_controller::class,'logout']);
Route::any('/web/addtocart',[usersite_controller::class,'addtocart']);
Route::get('/web/cart',[usersite_controller::class,'cart']);
Route::get('/delete/cart/{id}',[usersite_controller::class,'delete']);
Route::post('/add/qty',[usersite_controller::class,'addqty']);
Route::post('/minus/qty',[usersite_controller::class,'minusqty']);
Route::get('/placeorder',[usersite_controller::class,'placeorder']);

Route::post('/confirmorder',[orderhistory_controller::class,'confirm_order']);
Route::get('/web/orderhistory',[orderhistory_controller::class,'orderhistory']);
Route::get('/orderhistory/view/{id}',[orderhistory_controller::class,'ohview']);
Route::any('/order/review',[orderhistory_controller::class,'orderreview']);









Route::get('/admin',[admin_controller::class,'index']);
Route::get('/review',[admin_controller::class,'orderreview']);
Route::get('/review/status/{id}',[admin_controller::class,'status']);
Route::get('/review/dstatus/{id}',[admin_controller::class,'dstatus']);

Route::get('/gallery',[gallery_controller::class,'index']);
Route::get('/image/add',[gallery_controller::class,'add']);
Route::get('/image/list',[gallery_controller::class,'list']);
Route::post('/galleryimage/insert',[gallery_controller::class,'insert']);
Route::get('/image/status/{id}',[gallery_controller::class,'status']);
Route::get('/image/dstatus/{id}',[gallery_controller::class,'dstatus']);
Route::any('/image/edit/{id}',[gallery_controller::class,'edit']);
Route::get('/image/delete/{id}',[gallery_controller::class,'delete']);
Route::any('/galleryimage/update',[gallery_controller::class,'update']);


Route::get('/neworder',[neworder_controller::class,'index']);
Route::post('/neworder/view',[neworder_controller::class,'neworderview']);
Route::post('/neworder/cancel',[neworder_controller::class,'cancelorder']);
Route::post('/neworder/allocate',[neworder_controller::class,'allocateorder']);


Route::get('/allocateorder',[allocatedorder_controller::class,'index']);
Route::post('/allocatedorder/view',[allocatedorder_controller::class,'allocatedorderview']);
Route::post('/allocatedorder/complete',[allocatedorder_controller::class,'completeorder']);
Route::post('/allocatedorder/cancel',[allocatedorder_controller::class,'cancelorder']);


Route::get('/completeorder',[confirmorder_controller::class,'index']);
Route::post('/completeorder/view',[confirmorder_controller::class,'completeorderview']);

Route::get('/cancelorder',[cancelorder_controller::class,'index']);
Route::post('/cancelorder/view',[cancelorder_controller::class,'cancelorderview']);
Route::post('/cancelorder/renew',[cancelorder_controller::class,'reneworder']);

Route::get('/payment',[payment_controller::class,'index']);
Route::post('/payment/view',[payment_controller::class,'paymentorderview']);
Route::post('/payment/datefilter',[payment_controller::class,'datefilter']);

  
Route::get('/userlist',[userlist_controller::class,'index']);
Route::get('/user/view/{id}',[userlist_controller::class,'view']);
Route::get('/user/status/{id}',[userlist_controller::class,'status']);
Route::get('/user/dstatus/{id}',[userlist_controller::class,'dstatus']);

 
Route::get('/category',[category_controller::class,'index']);
Route::get('/category/add',[category_controller::class,'add']);
Route::post('/category/insert',[category_controller::class,'insert']);
Route::get('/category/list',[category_controller::class,'list']);
Route::post('/category/edit',[category_controller::class,'edit']);
Route::any('/category/update',[category_controller::class,'update']);
Route::get('/category/delete/{id}',[category_controller::class,'delete']);
Route::post('/searchcategory',[category_controller::class,'search']);


Route::get('/product',[product_controller::class,'index']);
Route::get('/product/add',[product_controller::class,'add']);
Route::post('/product/insert',[product_controller::class,'insert']);
Route::get('/product/list',[product_controller::class,'list']);
Route::get('/product/delete/{id}',[product_controller::class,'delete']);
Route::get('/product/status/{id}',[product_controller::class,'status']);
Route::get('/product/dstatus/{id}',[product_controller::class,'dstatus']);
Route::get('/product/view/{id}',[product_controller::class,'view']);
Route::any('/product/edit/{id}',[product_controller::class,'edit']);
Route::any('/product/update/{id}',[product_controller::class,'update']); 
Route::any('/product/getsubcategory',[product_controller::class,'getsubcategory']);


// Route::get('/bringer',[bringer_controller::class,'index']);
// Route::get('/bringer/add',[bringer_controller::class,'add']);
// Route::post('/bringer/insert',[bringer_controller::class,'insert']);

// Route::get('/stockcarrier',[stockcarrier_controller::class,'index']);
// Route::get('/stockcarrier/add',[stockcarrier_controller::class,'add']);
// Route::post('/stockcarrier/insert',[stockcarrier_controller::class,'insert']);

// Route::get('/stock',[stock_controller::class,'index']);
// Route::get('/stock/add',[stock_controller::class,'add']);
// Route::post('/stock/insert',[stock_controller::class,'insert']);


});