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
/*
Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::group(['prefix' => 'admin'], function () {
    Route::get('widget',['uses'=>'Admin\WidgetController@index'])->name('admin.widget');
    Voyager::routes();

});

Route::get('404',['as'=>'404','uses'=>'ErrorHandlerController@errorCode404']);

Route::get('405',['as'=>'405','uses'=>'ErrorHandlerController@errorCode405']);



// Home Page
Route::get('/', 'HomeController@index')->name('home');

//Show Category/{slug} Page
Route::get('/category/{slug}', 'CategoryController@index')->name('category');

//Show Tag/{slug} Page
Route::get('/tag/{slug}', 'TagController@index')->name('tag');

//Show Book/{slug} Page
Route::get('/book/{slug}', 'BookController@index')->name('book');


//Show Search Page
Route::get('/search', 'SearchController@index')->name('search');


// Show static Page
//Route::get('/{slug}', 'PageController@index')->name('page')->where('slug', '[A-Za-z0-9-]+');

