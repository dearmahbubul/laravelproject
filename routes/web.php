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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/','WelcomeController@index');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/category','WelcomeController@category');


Route::get('/add-category','CategoryController@AddCategory');
Route::post('/store-category','CategoryController@storeCategory');
Route::get('/manage-category','CategoryController@AllCategoryList');
Route::get('/unpublish-category/{cat_id}','CategoryController@UnpublishCategory');
Route::get('/publish-category/{cat_id}','CategoryController@PublishCategory');
Route::get('/edit-category/{cat_id}','CategoryController@EditCategory');
Route::post('/update-category','CategoryController@UpdateCategory');
Route::get('/delete-category/{cat_id}','CategoryController@DeleteCategory');



Route::get('/add-brand','BrandController@addBrand');
Route::post('/store-brand','BrandController@storeBrand');
Route::get('/manage-brand','BrandController@allBrand');
Route::get('/unpublish-brand/{brand_id}','BrandController@unpublishBrand');
Route::get('/publish-brand/{brand_id}','BrandController@publishBrand');
Route::get('/edit-brand/{brand_id}','BrandController@editBrand');
Route::post('/update-brand','BrandController@updateBrand');
Route::get('/delete-brand/{brand_id}','BrandController@deleteBrand');


Route::get('/add-product','ProductController@addProduct');
Route::post('/store-product','ProductController@storeProduct');
Route::get('/manage-product','ProductController@allProduct');
Route::get('/unpublish-product/{product_id}','ProductController@unpublishProduct');
Route::get('/publish-product/{product_id}','ProductController@publishProduct');
Route::get('/edit-product/{product_id}','ProductController@editProduct');
Route::post('/update-product','ProductController@updateProduct');
Route::get('/delete-product/{product_id}','ProductController@deleteProduct');



