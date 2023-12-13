<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Backend\UsersController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\SuppliersController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\UnitController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\PurchaseController;
use App\Http\Controllers\Backend\DefaultController;
use App\Http\Controllers\Backend\QuotationController;
use App\Http\Controllers\Backend\ChallanController;
use App\Http\Controllers\Backend\BillController;


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

Route::get('/clear', function() {

Artisan::call('cache:clear');
Artisan::call('config:cache');
Artisan::call('view:clear');
return "Cleared!";
});

Route::get('/',[FrontendController::class, 'index']);

Auth::routes(['register'=>false]);

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>'auth'],function(){
//--User Route--//
Route::prefix('users')->group(function () {
Route::get('/index',[UsersController::class, 'index'])->name('users.index');
Route::get('/edit/{id}',[UsersController::class, 'edit'])->name('users.edit');
Route::post('/update/{id}',[UsersController::class, 'update'])->name('update.user');
Route::get('/add',[UsersController::class, 'add'])->name('user.add');
Route::post('/store',[UsersController::class, 'store'])->name('store.user');
Route::get('/delete/{id}',[UsersController::class, 'delete'])->name('users.delete');

});

//--Profile Route--//

Route::prefix('profile')->group(function(){
Route::get('/index',[ProfileController::class, 'index'])->name('profile.index');
Route::get('/edit',[ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/update',[ProfileController::class, 'update'])->name('profile.update');

//--Profile Password Change --//

Route::get('/password-edit',[ProfileController::class, 'Editpassword'])->name('profile.password-change');
Route::post('/password-update',[ProfileController::class, 'updatePassword'])->name('profiles.update.password');

});


//--Suppliers Route--//
Route::prefix('suppliers')->group(function () {
Route::get('/index',[SuppliersController::class, 'index'])->name('suppliers.index');
Route::get('/edit/{id}',[SuppliersController::class, 'edit'])->name('suppliers.edit');
Route::post('/update/{id}',[SuppliersController::class, 'update'])->name('suppliers.update');
Route::get('/add',[SuppliersController::class, 'add'])->name('suppliers.add');
Route::post('/store',[SuppliersController::class, 'store'])->name('suppliers.store');
Route::get('/delete/{id}',[SuppliersController::class, 'delete'])->name('suppliers.delete');

});

//--Customers Route--//
Route::prefix('customers')->group(function () {
Route::get('/index',[CustomerController::class, 'index'])->name('customers.index');
Route::get('/edit/{id}',[CustomerController::class, 'edit'])->name('customers.edit');
Route::post('/update/{id}',[CustomerController::class, 'update'])->name('customers.update');
Route::get('/add',[CustomerController::class, 'add'])->name('customers.add');
Route::post('/store',[CustomerController::class, 'store'])->name('customers.store');
Route::get('/delete/{id}',[CustomerController::class, 'delete'])->name('customers.delete');

});

//--Units Route--//
Route::prefix('units')->group(function () {
Route::get('/index',[UnitController::class, 'index'])->name('units.index');
Route::get('/edit/{id}',[UnitController::class, 'edit'])->name('units.edit');
Route::post('/update/{id}',[UnitController::class, 'update'])->name('units.update');
Route::get('/add',[UnitController::class, 'add'])->name('units.add');
Route::post('/store',[UnitController::class, 'store'])->name('units.store');
Route::get('/delete/{id}',[UnitController::class, 'delete'])->name('units.delete');

});

//--Type Route--//
Route::prefix('category')->group(function () {
Route::get('/index',[CategoryController::class, 'index'])->name('category.index');
Route::get('/edit/{id}',[CategoryController::class, 'edit'])->name('category.edit');
Route::post('/update/{id}',[CategoryController::class, 'update'])->name('category.update');
Route::get('/add',[CategoryController::class, 'add'])->name('category.add');
Route::post('/store',[CategoryController::class, 'store'])->name('category.store');
Route::get('/delete/{id}',[CategoryController::class, 'delete'])->name('category.delete');

});


//--Quotation Route--//
Route::prefix('quotation')->group(function () {
Route::get('/index',[QuotationController::class, 'index'])->name('quotation.index');
Route::get('/add',[QuotationController::class, 'add'])->name('quotation.add');
Route::get('/edit/{id}',[QuotationController::class, 'edit'])->name('quotation.edit');
Route::post('/update/{id}',[QuotationController::class, 'update'])->name('quotation.update');

Route::post('/store',[QuotationController::class, 'store'])->name('quotation.store');
Route::get('/delete/{id}',[QuotationController::class, 'delete'])->name('quotation.delete');
Route::get('/quotation-pdf/{id}',[QuotationController::class, 'quotation_pdf'])->name('quotaion.print');

});

//--Challan Route--//
Route::prefix('challan')->group(function () {
Route::get('/index',[ChallanController::class, 'index'])->name('challan.index');
Route::get('/add',[ChallanController::class, 'add'])->name('challan.add');
Route::get('/edit/{id}',[ChallanController::class, 'edit'])->name('challan.edit');
Route::post('/update/{id}',[ChallanController::class, 'update'])->name('challan.update');

Route::post('/store',[ChallanController::class, 'store'])->name('challan.store');
Route::get('/delete/{id}',[ChallanController::class, 'delete'])->name('challan.delete');
Route::get('/challan-pdf/{id}',[ChallanController::class, 'challan_pdf'])->name('challan.print');

});

//--Bill Route--//
Route::prefix('bill')->group(function () {
Route::get('/index',[BillController::class, 'index'])->name('bill.index');
Route::get('/add',[BillController::class, 'add'])->name('bill.add');

Route::post('/store',[BillController::class, 'store'])->name('bill.store');
Route::get('/delete/{id}',[BillController::class, 'delete'])->name('bill.delete');
Route::get('/bill-pdf/{id}',[BillController::class, 'bill_pdf'])->name('bill.print');

});

//Product management Route

Route::prefix('product')->group(function(){

Route::get('/index',[ProductController::class, 'index'])->name('product.index');
Route::get('/edit/{id}',[ProductController::class, 'edit'])->name('product.edit');
Route::post('/store',[ProductController::class, 'store'])->name('product.store');
Route::get('/add',[ProductController::class, 'add'])->name('product.add');
Route::post('/update/{id}',[ProductController::class, 'update'])->name('product.update');
Route::get('/delete/{id}',[ProductController::class, 'delete'])->name('product.delete');



});

//Product purchase Route

Route::prefix('purchase')->group(function(){

Route::get('/index',[PurchaseController::class, 'index'])->name('purchase.index');
Route::post('/store',[PurchaseController::class, 'store'])->name('purchase.store');
Route::get('/purchase.pendng',[PurchaseController::class, 'purchasePendngList'])->name('purchase.pendng.list');
Route::get('/purchase.approve/{id}',[PurchaseController::class, 'purchaseApproved'])->name('purchase.approve');
Route::get('/add',[PurchaseController::class, 'add'])->name('purchase.add');
Route::get('/delete/{id}',[PurchaseController::class, 'delete'])->name('purchase.delete');



});


//Dependent Route Ex. Supplier,Category And Product Route Defalut

Route::get('/get-category',[DefaultController::class,'get_category'])->name('get-category');
Route::get('/get-product',[DefaultController::class,'get_product'])->name('get-product');


});
