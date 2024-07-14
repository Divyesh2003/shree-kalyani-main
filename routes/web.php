<?php

use Illuminate\Support\Facades\Route;

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
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    // Route::get('/test', [App\Http\Controllers\HomeController::class, 'test'])->name('test');
    Route::get('/category/{slug}', [App\Http\Controllers\HomeController::class, 'category'])->name('category');
    Route::get('/shop', [App\Http\Controllers\HomeController::class, 'shop'])->name('shop');
    Route::get('/New/Arraival', [App\Http\Controllers\HomeController::class, 'arraival'])->name('new.arraival');
    Route::get('/shop/{slug}', [App\Http\Controllers\HomeController::class, 'product'])->name('product');
    Route::get('/blog', [App\Http\Controllers\HomeController::class, 'blog'])->name('blog');
    Route::get('/blog/{slug}', [App\Http\Controllers\HomeController::class, 'blogSingle'])->name('blog.single');
    Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about_us');
    Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact_us');
    Route::post('/cart/add/{product}',[App\Http\Controllers\HomeController::class, 'addCart'])->name('cart.add');
    Route::post('/cart/remove', [App\Http\Controllers\HomeController::class, 'removeProduct'])->name('cart.remove');
    Route::get('/cart', [App\Http\Controllers\HomeController::class, 'cart'])->name('cart');
    Route::get('/whishlist', [App\Http\Controllers\HomeController::class, 'whishlist'])->name('whishlist');
    Route::get('/shipping-policy', [App\Http\Controllers\HomeController::class, 'shipping'])->name('shipping');
    Route::get('/privacy-policy', [App\Http\Controllers\HomeController::class, 'privacy'])->name('privacy');
    Route::get('/shipping-info', [App\Http\Controllers\HomeController::class, 'shipping_info'])->name('shipping.info');
    Route::get('/delivery-info', [App\Http\Controllers\HomeController::class, 'delivery_info'])->name('delivery.info');
    Route::get('/product/{id}/details', [App\Http\Controllers\HomeController::class, 'getProductDetails'])->name('product.details');
    //API state 
    Route::get('/get-states/{country_id}', [App\Http\Controllers\HomeController::class, ' getStates'])->name('api.state');
    Route::post('/inquiry', [App\Http\Controllers\HomeController::class, 'inquiry'])->name('inquiry');
    // wishlist
    Route::post('/wishlist/add/{product}', [App\Http\Controllers\WishlistController::class, 'add'])->name('wishlist.add');
    Route::post('/wishlist/remove/{product}', [App\Http\Controllers\WishlistController::class, 'remove'])->name('wishlist.remove');
    Route::get('/wishlist', [App\Http\Controllers\WishlistController::class, 'index'])->name('wishlist.index');
    //compare
    Route::post('/compare/add/{product}', [App\Http\Controllers\CompareController::class, 'add'])->name('compare.add');
    Route::post('/compare/remove/{product}', [App\Http\Controllers\CompareController::class, 'remove'])->name('compare.remove');
    Route::get('/compare', [App\Http\Controllers\CompareController::class, 'index'])->name('compare.index');
    Route::post('/suscribe', [App\Http\Controllers\SuscribeController::class, 'index'])->name('suscribe');
    Route::get('/compare/clear', [App\Http\Controllers\CompareController::class, 'clearCompare'])->name('compare.clear');
    //search
    Route::post('autocomplete', [App\Http\Controllers\HomeController::class, 'autocomplete'])->name('search.list');
    Route::get('login', [App\Http\Controllers\AuthController::class, 'index'])->name('login');
    Route::post('post-login', [App\Http\Controllers\AuthController::class, 'postLogin'])->name('login.post'); 
    Route::get('/logout',[App\Http\Controllers\AuthController::class,'logout'])->name('logout');
    Route::get('/get-states/{country_id}', [App\Http\Controllers\HomeController::class,'getStates'])->name('state');
    // routes/web.php
    Route::middleware('auth')->group(function () {
    Route::get('/account', [App\Http\Controllers\AccountController::class, 'index'])->name('account');
    Route::post('/account/update', [App\Http\Controllers\AccountController::class, 'update'])->name('account.update');
    Route::post('/account/update/email', [App\Http\Controllers\AccountController::class, 'email_update'])->name('account.update.email');
    Route::get('/checkout', [App\Http\Controllers\HomeController::class, 'checkout'])->name('checkout');
    Route::post('/order/process', [App\Http\Controllers\OrderController::class, 'orderProcess'])->name('order.store');
    Route::get('/thankyou', [App\Http\Controllers\OrderController::class, 'thankyou'])->name('thankyou');
    Route::get('/order/{id}', [App\Http\Controllers\OrderController::class, 'singleOrder'])->name('single.order');
    Route::get('/order/download/{id}', [App\Http\Controllers\OrderController::class, 'singleOrderDownload'])->name('single.order.dowload');
    Route::post('/review', [App\Http\Controllers\HomeController::class, 'review'])->name('review');
        });
    //Admin Panel 
    Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/login', [App\Http\Controllers\Admin\AdminAuthController::class, 'getLogin'])->name('adminLogin');
    Route::post('/login/store', [App\Http\Controllers\Admin\AdminAuthController::class, 'postLogin'])->name('adminLoginPost');
    Route::get('/admin/logout', [App\Http\Controllers\Admin\AdminAuthController::class, 'adminLogout'])->name('admin.logout');
    Route::get('/dashboard', [App\Http\Controllers\Admin\HomeController::class, 'dashboard'])->name('admin.dashboard');
    Route::group(['middleware' => 'adminauth'], function () {
    Route::get('/setting/profile', [App\Http\Controllers\Admin\HomeController::class, 'profile'])->name('admin.setting.profile');
    Route::get('/calculator', [App\Http\Controllers\Admin\HomeController::class, 'calculator'])->name('admin.calculator');
    Route::post('/setting/profile', [App\Http\Controllers\Admin\HomeController::class, 'profileStore'])->name('admin.setting.profile.store');
    Route::resource('/category', '\App\Http\Controllers\Admin\CategoryController',['names'=>'admin.category']);
    Route::resource('/product', '\App\Http\Controllers\Admin\ProductController',['names'=>'admin.product']);
    Route::resource('/blog/category', '\App\Http\Controllers\Admin\BlogCategoryController',['names'=>'admin.blog.category']);
    Route::resource('/blogs', '\App\Http\Controllers\Admin\BlogController',['names'=>'admin.blog']);
    Route::resource('/user', '\App\Http\Controllers\Admin\UserController',['names'=>'admin.user']);
    Route::resource('/users/role', '\App\Http\Controllers\Admin\UserRoleController',['names'=>'admin.user.role']);
    Route::resource('/users/permission', '\App\Http\Controllers\Admin\UserPermissionController',['names'=>'admin.user.permission']);
    Route::resource('/expense', '\App\Http\Controllers\Admin\ExpenseController',['names'=>'admin.expense']);
    Route::resource('/supllier', '\App\Http\Controllers\Admin\SupllierController',['names'=>'admin.supllier']);
    Route::resource('/inquiry', '\App\Http\Controllers\Admin\InquiryController',['names'=>'admin.inquiry']);
    Route::resource('/country', '\App\Http\Controllers\Admin\CountryController',['names'=>'admin.country']);
    Route::resource('/state', '\App\Http\Controllers\Admin\StateController',['names'=>'admin.state']);
    Route::resource('/purchase', '\App\Http\Controllers\Admin\PurchaseController',['names'=>'admin.purchase']);
    Route::resource('/suscribe', '\App\Http\Controllers\Admin\SuscribeController',['names'=>'admin.suscribe']);
    Route::resource('/order', '\App\Http\Controllers\Admin\OrderController',['names'=>'admin.order']);
    Route::get('/download/{id}', [App\Http\Controllers\Admin\PurchaseController::class, 'download'])->name('admin.download');
    Route::get('/tracking/order/{id}', [App\Http\Controllers\Admin\OrderController::class, 'tracking'])->name('admin.tracking.order');
    Route::post('/tracking/order/status', [App\Http\Controllers\Admin\OrderController::class, 'status'])->name('admin.tracking.status');
    Route::post('/tracking/order/shipment/update', [App\Http\Controllers\Admin\OrderController::class, 'shipment'])->name('admin.order.shippment');
        });
    }); 