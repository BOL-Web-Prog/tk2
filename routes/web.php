<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductCRUDController;
use App\Http\Controllers\UsersAuthController;

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




Route::get('/', function () {
    $data['registered_user'] = DB::table('tbl_user')->count();
    $data['registered_product'] = DB::table('tbl_product')->count();
    return view('home', ['title' => 'Dashboard','meta'=>'Dashboard', 'data'=>$data]);
})->name('home');

Route::get('register', [UsersAuthController::class, 'register'])->name('register');
Route::post('register', [UsersAuthController::class, 'register_action'])->name('register.action');
Route::get('login', [UsersAuthController::class, 'login'])->name('login');
Route::post('login', [UsersAuthController::class, 'login_action'])->name('login.action');
Route::get('password', [UsersAuthController::class, 'password'])->name('password');
Route::post('password', [UsersAuthController::class, 'password_action'])->name('password.action');
Route::get('logout', [UsersAuthController::class, 'logout'])->name('logout');


Route::get('userList', [UsersAuthController::class, 'userList'])->name('userList');
Route::get('/userDelete/{id}', [UsersAuthController::class, 'userDelete'])->name('userDelete');
Route::post('/userUpdate/', [UsersAuthController::class, 'userUpdate'])->name('userUpdate');
Route::get('/productDelete/{id}', [ProductCRUDController::class, 'productDelete'])->name('productDelete');
Route::post('/productAdd/', [ProductCRUDController::class, 'productAdd'])->name('productAdd');
Route::post('/productUpdate/', [ProductCRUDController::class, 'productUpdate'])->name('productUpdate');

Route::get('productList', [ProductCRUDController::class, 'productList'])->name('productList');
