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
use App\Product;
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('add','ProductController@create');
Route::post('view','ProductController@AddProduct');

Route::get('view','ProductController@view');

//Route::get('read/{id}','ManageController@read');
//Route::post('read/{id}','ManageController@read');

Route::get('add/{id}',function ($id){
    $product=Product::find($id);
    $product->delete();
    return redirect("view");
});

Route::get('edit/{id}','ProductController@create');
Route::post('edit/{id}','ProductController@EditProduct');


Route::post('AddProduct','ProductController@AddProduct');