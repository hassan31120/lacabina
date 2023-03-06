<?php

use App\Http\Controllers\Dash\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController as Auth;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\CategoriesController;
use App\Http\Controllers\Api\MasajedController;
use App\Http\Controllers\Api\NewsController;
use App\Http\Controllers\Api\OrdersController;
use App\Http\Controllers\Api\ProductsController;
use App\Http\Controllers\Api\SettingsController;
use App\Http\Controllers\Api\SubCategoriesController;
use App\Http\Controllers\Dash\CityController;
use App\Http\Controllers\Dash\NotiController;

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

Route::middleware('isAdmin')->get('/authenticated', function () {
    return true;
});


//this is the start of application apis:
Route::post('register', [Auth::class, 'register']);
Route::post('login', [Auth::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/add_address', [AddressesController::class, 'store']);
    Route::put('/edit_address/{id}', [AddressesController::class, 'update']);
    Route::post('/del_address/{id}', [AddressesController::class, 'destroy']);
    Route::get('/user_addresses', [AddressesController::class, 'user_addresses']);
    Route::get('/address/{id}', [AddressesController::class, 'show']);

    Route::post('edit_profile', [UserController::class, 'editData']);
    Route::post('change_password', [UserController::class, 'change_password']);
    Route::get('profile', [UserController::class, 'profile']);

    Route::post('addToCart/{id}', [CartController::class, 'addToCart']);
    Route::post('zamzamToCart/{id}', [CartController::class, 'zamzamToCart']);
    Route::post('masajedToCart/{id}', [CartController::class, 'masajedToCart']);
    Route::get('cartItems', [CartController::class, 'cartItems']);
    Route::post('addQuantity/{id}', [CartController::class, 'addQuantity']);
    Route::post('rmQuantity/{id}', [CartController::class, 'rmQuantity']);
    Route::post('removeItem/{id}', [CartController::class, 'removeItem']);

    Route::post('confirm_order', [OrdersController::class, 'confirm_order']);
    Route::get('order_details/{id}', [OrdersController::class, 'order_details']);
    Route::get('user_orders', [OrdersController::class, 'user_orders']);
});

Route::post('send_code', [UserController::class, 'send_code']);
Route::post('confirm_code/{id}', [UserController::class, 'confirm_code']);
Route::post('password_reset', [UserController::class, 'password_reset']);

Route::get('news', [NewsController::class, 'index']);
Route::get('banners', [BannersController::class, 'index']);
Route::get('categories', [CategoriesController::class, 'index'])->middleware('lang');
Route::get('subcategories', [SubCategoriesController::class, 'index'])->middleware('lang');
Route::get('subcategory/{id}', [SubCategoriesController::class, 'comCat'])->middleware('lang');

Route::get('products', [ProductsController::class, 'index'])->middleware('lang');
Route::get('catproducts/{id}', [ProductsController::class, 'CatProducts'])->middleware('lang');
Route::post('searchProducts', [ProductsController::class, 'searchProducts'])->middleware('lang');

Route::get('cities', [AddressesController::class, 'cities']);

Route::get('settings', [SettingsController::class, 'index'])->middleware('lang');

Route::post('delUser', [UserController::class, 'delUser'])->middleware('auth:api');
//end of app apis

// this is the start of the dashboard apis :
Route::group(['prefix' => 'dash', 'middleware' => 'isAdmin'], function () {
    // Users
    Route::get('admins', [AuthController::class, 'admins']);
    Route::get('users', [AuthController::class, 'users']);
    Route::get('user/show/{id}', [AuthController::class, 'show']);
    Route::post('user/add', [AuthController::class, 'dashRegister']);
    Route::post('user/edit/{id}', [AuthController::class, 'update']);
    Route::post('user/del/{id}', [AuthController::class, 'delUser']);

    //noti
    Route::post('/push', [NotiController::class, 'push']);

    // cities
    Route::get('cities', [CityController::class, 'index']);
    Route::get('city/show/{id}', [CityController::class, 'show']);
    Route::post('city/add', [CityController::class, 'store']);
    Route::post('city/edit/{id}', [CityController::class, 'update']);
    Route::post('city/del/{id}', [CityController::class, 'destroy']);
});

Route::post('/dashLogin', [AuthController::class, 'dashLogin']);
Route::post('/logout', [AuthController::class, 'logout']);
