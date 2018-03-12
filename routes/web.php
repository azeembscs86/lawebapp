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

Route::get('/', function () {
    return view('index');
});

//---------------------------admin routes------------------------------------------------------//
Route::get('/admin/dashboard', 'Admin\AdminController@index'); //----------------admin dashboard

Route::prefix('admin')->group(function(){    
    
    Route::get('/categories','Admin\Categories\CategoriesController@index');  //-------------------get categories
    
    Route::post('/categories/save-categories','Admin\Categories\CategoriesController@addCategory');    //-------------------add new category
    
    Route::post('/categories/update-category','Admin\Categories\CategoriesController@updateCategory');  //------------------update category
     
    Route::get('/categories/destroy/{slug}','Admin\Categories\CategoriesController@destroy');
    
    Route::get('/brands','Admin\Brands\BrandsController@index');              //-------------------get Brands
    
    Route::post('/brands/save-brand','Admin\Brands\BrandsController@addBrand'); //----------------add new brand
    
    Route::post('/brands/update-brand','Admin\Brands\BrandsController@updateBrand'); //----------------update brand
    
    Route::get('/products','Admin\Products\ProductsController@index');      //--------------------get Products
    
    Route::get('/login', 'Auth\AuthorController@showLoginForm')->name('admin.login'); //---------admin login form
    
    Route::post('/login', 'Auth\AuthorController@login')->name('admin.login.submit'); //---------admin login form post   
    
    Route::get('/change-password', 'Admin\AdminController@changePassword');        //-----------admin change password
    
    Route::post('/password-reset', 'Admin\AdminController@resetPassword');
    
    Route::get('/', 'Admin\AdminController@index');  
    
    Route::get('/logout', 'Admin\AdminController@adminLogout');
    
    
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('logout', 'Auth\LoginController@logout');