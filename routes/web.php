<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
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
Auth::routes();
//Route::get('/', 'App\Http\Controllers\IndexController@index');
Route::get('/', 'App\Http\Controllers\IndexController');
Route::get('/count', 'App\Http\Controllers\CountController')->name('count');

//Route::get('/asincposts', 'App\Http\Controllers\AsincController');
    //API
    //=========================================================================
    Route::get('/hints', 'App\Http\Controllers\HintsController');
    Route::get('/productHints', 'App\Http\Controllers\ProductHintsController');
    Route::post('/session', 'App\Http\Controllers\SessionController')->name('session.index');
    Route::get('/session', 'App\Http\Controllers\SessionController')->name('product.index');
   
    //=========================================================================
//CRUD для рецептов--------------------
Route::group(['namespace'=>'App\Http\Controllers\Post'], function(){

    Route::get('/posts', 'IndexController')->name('post.index'); //laravel 8* требует полный путь к контроллеру
    Route::get('/posts/create', 'CreateController')->name('post.create');
    Route::post('/posts', 'StoreController')->name('post.store');
    Route::get('/posts/{post}', 'ShowController')->name('post.show');
    Route::get('/posts/{post}/edit', 'EditController')->name('post.edit');
    Route::patch('/posts/{post}', 'UpdateController')->name('post.update');
    Route::delete('/posts/{post}', 'DestroyController')->name('post.delete');
 

} );
//CRUD для продуктов

//---------------------------------------
//CRUD для админки=======================prefix для всей группы перед /post вставит admin
Route::group(['namespace'=>'App\Http\Controllers\Admin', 'prefix'=>'admin','middleware'=>'admin'], function(){
    Route::group(['namespace'=>'Post'], function(){
        Route::get('/post', 'IndexController')->name('admin.post.index');
        Route::get('/post/create', 'CreateController')->name('admin.post.create');
        Route::post('/post', 'StoreController')->name('admin.post.store');
        Route::get('/post/{post}', 'ShowController')->name('admin.post.show');
        Route::get('/post/{post}/edit', 'EditController')->name('admin.post.edit');
        Route::patch('/post/{post}', 'UpdateController')->name('admin.post.update');
        Route::delete('/post/{post}', 'DestroyController')->name('admin.post.delete');
    });
    Route::group(['namespace'=>'Product'], function(){
        Route::get('/product', 'IndexController')->name('admin.product.index');
        Route::get('/product/create', 'CreateController')->name('admin.product.create');
        Route::post('/product', 'StoreController')->name('admin.product.store');
        Route::get('/product/{category}', 'ShowController')->name('admin.product.show');
        Route::get('/product/{product}/edit', 'EditController')->name('admin.product.edit');
        Route::patch('/product/{product}', 'UpdateController')->name('admin.product.update');
        Route::delete('/product/{category}', 'DestroyController')->name('admin.product.delete');
        //Route::get('/product/category/{category}', 'showByCategoryController')->name('admin.product.showByCategory');
    });
});


//=======================================

//для продуктов CRUD
Route::post('/products', 'App\Http\Controllers\ProductController@session')->name('product.session');//laravel 8* требует полный путь к контроллеру
Route::get('/products', 'App\Http\Controllers\ProductController@index')->name('product.index');//laravel 8* требует полный путь к контроллеру
Route::get('/products/create', 'App\Http\Controllers\ProductController@create')->name('product.create');
Route::post('/products', 'App\Http\Controllers\ProductController@store')->name('product.store');
Route::get('/product/{product}', 'App\Http\Controllers\ProductController@show')->name('product.show');
Route::get('/product/category/{category}', 'App\Http\Controllers\ProductController@showByCategory')->name('product.showByCategory');
Route::get('/products/{product}/edit', 'App\Http\Controllers\ProductController@edit')->name('product.edit');
Route::patch('/products/{product}', 'App\Http\Controllers\ProductController@update')->name('product.update');
Route::delete('/products/{product}', 'App\Http\Controllers\ProductController@destroy')->name('product.delete');
//Route::get('/product/category/{category}', 'App\Http\Controllers\ProductController@showByCategory')->name('admin.product.showByCategory');
//=========================*/

Route::get('/main', 'App\Http\Controllers\MainController@index')->name('main.index');
Route::get('/about', 'App\Http\Controllers\AboutController@index')->name('about.index');
Route::get('/contacts', 'App\Http\Controllers\ContactController@index')->name('contacts.index');





Route::get('/posts/update', 'App\Http\Controllers\PostController@update');
Route::get('/posts/delete', 'App\Http\Controllers\PostController@delete');
Route::get('/posts/first_or_create', 'App\Http\Controllers\PostController@firstOrCreate');
Route::get('/posts/first_or_create', 'App\Http\Controllers\PostController@firstOrCreate');
Route::get('/posts/update_or_create', 'App\Http\Controllers\PostController@updateOrCreate');






Route::get('/refusal', function () {
    //
    return view('refusal');
})->name('refusal');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//для vue роутера
//Route::get('/{anypage}', 'App\Http\Controllers\IndexController');
