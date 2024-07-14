<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//Blog Category
Route::apiResource('/blog/category', '\App\Http\Controllers\Api\BlogCategoryController',['names'=>'api.blog.category']);
//Blog
Route::apiResource('/blogs', '\App\Http\Controllers\Api\BlogController',['names'=>'api.blog']);
//Category
Route::apiResource('/category', '\App\Http\Controllers\Api\CategoryController',['names'=>'api.category']);
//Expense
Route::apiResource('/expense', '\App\Http\Controllers\Api\ExpenseController',['names'=>'api.expense']);
//Inquiry
Route::apiResource('/inquiry', '\App\Http\Controllers\Api\InquiryController',['names'=>'api.inquiry']);
//Order
Route::apiResource('/order', '\App\Http\Controllers\Api\OrderController',['names'=>'api.order']);
//Product
Route::apiResource('/product', '\App\Http\Controllers\Api\ProductController',['names'=>'api.product']);
//Purchase
Route::apiResource('/purchase', '\App\Http\Controllers\Api\PurchaseController',['names'=>'api.purchase']);
//User
Route::apiResource('/user', '\App\Http\Controllers\Api\UserController',['names'=>'api.user']);
//User Role
Route::apiResource('/user/role', '\App\Http\Controllers\Api\UserRoleController',['names'=>'api.user.role']);
//User Permission
Route::apiResource('/user/permission', '\App\Http\Controllers\Api\UserPermissionController',['names'=>'api.user.permission']);
//Suscribe
Route::apiResource('/suscribe', '\App\Http\Controllers\Api\SuscribeController',['names'=>'api.suscribe']);
