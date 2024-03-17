<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\AuthController; //Import controller
use App\Http\Controllers\backend\DashboardController; //Import dashboard
use App\Http\Controllers\backend\ProductController; //Import prodcut
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\frontend\ContactController;
use App\Http\Controllers\frontend\LoginController;
use App\Http\Controllers\frontend\ProductFrontendController;
use App\Http\Controllers\frontend\CustomerController;
use App\Http\Controllers\frontend\CartController;









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

// Route::get('/', function () {
//     return view('welcome');
// });


// admin

Route::get('/admin', [AuthController::class, 'index'])->name('auth.admin');

//Dashboard
Route::get('/dashboard/index', [DashboardController::class, 'index'])->name('dashboard.index');

Route::resource('admin/product', ProductController::class, ['as'=>'admin']);

//Login admin
//Login 
Route::get('/admin', [AuthController::class, 'index'])->name('auth.admin');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');

// product admin
Route::get('/admin/product', [ProductController::class, 'index'])->name('admin.product.index');


// Đường dẫn để hiển thị form để thêm sản phẩm mới
Route::get('/admin/product/add', [ProductController::class, 'create'])->name('admin.product.add');
// Đường dẫn để xử lý việc gửi form để thêm sản phẩm mới
Route::post('/admin/product/add', [ProductController::class, 'add'])->name('admin.product.doAdd');

// Route::get('/admin/product/edit/{id}', [ProductController::class, 'getOneProduct'])->name('admin.product.editid');
// Route::get('/admin/product/edit', [ProductController::class, 'edit'])->name('admin.product.edit');
// Route::post('/admin/product/edit', [ProductController::class, 'edit'])->name('admin.product.doEdit');

Route::get('/admin/product/edit/{id}', [ProductController::class, 'getOneProduct'])->name('admin.product.edit');
Route::post('/admin/product/edit', [ProductController::class, 'edit'])->name('admin.product.doEdit');

//xoa
Route::get('/admin/product/delete/{id}', [ProductController::class, 'delete'])->name('admin.product.delete');






// user:

// trang home
Route::get('/', [HomeController::class, 'index']);
Route::get('/', [ProductFrontendController::class, 'productHome'])->name('productFrontend.index');
Route::get('/productsPage/{cate_id?}', [ProductFrontendController::class, 'getProductsByCategory'])->name('products.page');
Route::get('/products/{id}', [ProductFrontendController::class, 'showDetails'])->name('products.details');
//Send email

Route::get('send-mail', [MailController::class, 'index']);

// contact

Route::get('/contact', [ContactController::class, 'contact'])->name('contact.contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');



// login Customer
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authen');
    Route::get('/logout', 'logout')->name('logout');
});

// Register
Route::controller(CustomerController::class)->group(function () {
    Route::get('/register', 'index')->name('reg.index');
    Route::post('/createrregister', 'register')->name('reg.create');
});


// Cart
Route::get('/gio-hang', [CartController::class, 'Cart'])->name('shopping.cart');
Route::get('/gio-hang/{id}', [CartController::class, 'addCart'])->name('add.cart');
Route::patch('/update-shopping-cart', [CartController::class, 'updateCart'])->name('update.cart');
Route::delete('/delete-cart-product', [CartController::class, 'deleteProduct'])->name('delete.cart');
