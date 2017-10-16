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


Route::get('/category','WelcomeController@category');
Route::get('/add-category','CategoryController@AddCategory');
Route::post('/new-category','CategoryController@NewCategory');
Route::get('/manage-category','CategoryController@AllCategoryList');
Route::get('/unpublish-category/{cat_id}','CategoryController@UnpublishCategory');
Route::get('/publish-category/{cat_id}','CategoryController@PublishCategory');
Route::get('/edit-category/{cat_id}','CategoryController@EditCategory');
Route::post('/update-category','CategoryController@UpdateCategory');
Route::get('/delete-category/{cat_id}','CategoryController@DeleteCategory');



Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
