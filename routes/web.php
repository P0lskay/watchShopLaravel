<?php

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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Admin shop
$groupData = [
    'namespace' => 'Shop\Admin',
    'prefix' => 'admin/shop'
];
Route::group($groupData, function () {
    $methods = ['index', 'create', 'update', 'store', 'edit', 'destroy'];
    Route::resource('categories', 'ShopCategoryController')
        ->only($methods)
        ->names('shop.admin.categories');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
