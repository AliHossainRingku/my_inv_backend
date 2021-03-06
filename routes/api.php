<?php

//namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Api\V1\Auth\LoginController;
use App\Http\Controllers\Api\V1\Auth\RegisterController;

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

// Route::post('/tokens/create', function (Request $request) {
//     $token = $request->user()->createToken($request->token_name);

//     return ['token' => $token->plainTextToken];
// });




Route::get('/register', [RegisterController::class, 'showRegisterForm']);
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm']);
Route::post('/login', [LoginController::class, 'login']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//Below all are under sanctum middleware//
Route::middleware('auth:sanctum')->group(function () {

	//Route::get('/all-product', [ProductController::class, 'index']);
	Route::get('/all-products', [ProductController::class, 'getAllProducts']);


	///PRODUCTS MANAGE
	Route::get('/products', [ProductController::class, 'index']);
	Route::get('/products/create', [ProductController::class, 'create']);
	Route::post('/products', [ProductController::class, 'store']);
	Route::put('/products/{id}/edit', [ProductController::class, 'edit']);
	Route::put('/products/{id}', [ProductController::class, 'update']);
	Route::delete('/products/{id}', [ProductController::class, 'destroy']);


	///ORDER MANAGE
	Route::get('/orders', [OrderController::class, 'index']);
	Route::get('/orders/create', [OrderController::class, 'create']);
	Route::get('/orders/details/{id}', [OrderController::class, 'show']);
	Route::post('/orders', [OrderController::class, 'store']);
	Route::put('/orders/{id}/edit', [OrderController::class, 'edit']);
	Route::put('/orders/{id}', [OrderController::class, 'update']);
	Route::delete('/orders/{id}', [OrderController::class, 'destroy']);

	// ///ORDER DETAILS MANAGE
	// Route::get('/orders/details', [OrderController::class, 'index']);
	// Route::get('/orders/details/{id}', [OrderController::class, 'show']);
	// Route::post('/orders/details/{id}', [OrderController::class, 'store']);
	// Route::put('/orders/details/{id}/edit', [OrderController::class, 'edit']);
	// Route::put('/orders/details/{id}', [OrderController::class, 'update']);
	// Route::delete('/orders/details/{id}', [OrderController::class, 'destroy']);


	///CART MANAGE
	Route::get('/cart', [CartController::class, 'index']);
	Route::get('/cart/create', [CartController::class, 'create']);
	Route::post('/cart', [CartController::class, 'store']);
	Route::put('/cart/{id}/edit', [CartController::class, 'edit']);
	Route::put('/cart/{id}', [CartController::class, 'update']);
	Route::delete('/cart/{id}', [CartController::class, 'destroy']);
	//namespace App\Http\Controllers
	//Route::get('/add-product', [ProductController::class, 'addProduct']);
});