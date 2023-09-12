<?php

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Models\Order;

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

// Common Resource Routes:
// index - Show all listings
// show - Show single listing
// create - Show form to create new listing
// store - Store new listing
// edit - Show form to edit listing
// update - Update listing
// destroy - Delete listing  

// Show home page
Route::get('/', [ProductController::class, 'index']);

// Show product men page
Route::get('/product/men', [ProductController::class, 'menIndex']);

// Show product men page
Route::get('/product/women', [ProductController::class, 'womenIndex']);

// Show product men page
Route::get('/product/kids', [ProductController::class, 'kidsIndex']);

//Search 
Route::get('/product/search', [ProductController::class, 'search']);

//Show login form
Route::get('/login', [UserController::class, 'login']);

//Store new user
Route::post('/new-user', [UserController::class, 'store']);

//Show login form
Route::get('/register', [UserController::class, 'register']);

//Login user
Route::post('/user/authenticate', [UserController::class, 'authenticate']);

//Logout
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

//Show user-info
Route::get('/user', [UserController::class, 'show'])->middleware('auth');


//ADMIN
//Show admin page
Route::get('/admin', [UserController::class, 'adminShow']);

//Show admin product page
Route::get('/admin/product', [ProductController::class, 'productShow']);

//Show admin product page
Route::get('/admin/user', [UserController::class, 'userShow']);

//Edit user
Route::get('/admin/edit/user/{user}', [UserController::class, 'editUser']);

//Update user 
Route::put('/admin/user/edited/{user}', [UserController::class, 'storeUser']);

//Show add user
Route::get('/admin/add/user', [UserController::class, 'addUser']);

//Store new user
Route::post('/admin/added/user', [UserController::class, 'addedUser']);

//Delete user
Route::delete('/admin/delete/user/{user}', [UserController::class, 'deleteUser']);

//Show add product
Route::get('/admin/add/product', [ProductController::class, 'addProduct']);

//Show edit product
Route::get('/admin/edit/product/{product}', [ProductController::class, 'editProduct']);

//Store added product
Route::post('/admin/added/product', [ProductController::class, 'addedProduct']);

//Update edited product
Route::put('/admin/edited/product/{product}', [ProductController::class, 'editedProduct']);

//Delete product
Route::delete('/admin/delete/product/{product}', [ProductController::class, 'deleteProduct']);


//CART
//Show cart
Route::get('/cart', [CartController::class, 'show']);

//Add to cart
Route::post('/cart/add/{product}', [ProductController::class, 'add'])->middleware('auth');

//Remove product in cart
Route::delete('/remove/{product}', [CartController::class, 'remove']);

//Show checkout page
Route::get('/checkout', [OrderController::class, 'show']);

//Ordered cart
Route::post('/ckeckout/order', [OrderController::class, 'ordered']);

//FILTERS
//Dropdown filter
Route::get('/product/men/filter-drop', [ProductController::class, 'filterDrop']);
Route::get('/product/women/filter-drop', [ProductController::class, 'filterDropW']);
Route::get('/product/kids/filter-drop', [ProductController::class, 'filterDropK']);

//

//Show 
Route::get('/product/{product}', [ProductController::class, 'show']);
