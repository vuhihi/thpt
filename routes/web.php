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

Route::prefix('/')->group(function(){
	Route::get('/', 'HomeController@index')->name('home');;
	Route::get('/add-category',function(){
		return view('admin.add_category');
	});
	Route::post('/add-category','AdminController@addCategory');
});

Route::prefix('/member')->group(function(){
	Route::get('/register','member\RegisterController@get_registration');
	Route::post('/register','member\RegisterController@post_registration');
	Route::get('/login','member\LoginController@get_login');
	Route::post('/login','member\LoginController@post_login');
	Route::get('/logout','member\LogoutController@post_logout');
});

Route::group(['prefix' => 'admin', 'middleware' => ['checkadmin']],function(){

	Route::post('/set-category-link','admin\CategoryController@setCategoryLink');

	Route::post('/set-page-link','admin\PageController@setPageLink');

	Route::post('/set-parent-name','admin\PageController@setParentName');

	Route::get('/',function(){
		return view('admin.layout');
	});

	Route::get('/select-category','admin\CategoryController@selectCategory');
	

	Route::get('/edit-category/{id}','admin\CategoryController@editCategory');

	Route::get('/add-category',function(){
		return view('admin.add_category');
	});
	Route::post('/add-category','admin\CategoryController@addCategory');

	
	Route::get('/add-page',function(){
		return view('admin.add_page');
	});

	Route::post('/add-page','admin\PageController@addPage');

	Route::get('/get-parent','admin\CategoryController@getParent');
});

Route::get('{category}','pageview\TutorialPageController@getCategoryitem');
Route::get('{category}/{page}','pageview\TutorialPageController@getItemContent');



