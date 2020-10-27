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
    Route::resource('watches', 'WatchController')
        ->except(['show'])
        ->names('shop.admin.watches');
});

//User shop
Auth::routes();


Route::get('/', 'Shop\Custom\ShopWatchController@index');
Route::get('/show/{id}', 'Shop\Custom\ShopWatchController@show');
