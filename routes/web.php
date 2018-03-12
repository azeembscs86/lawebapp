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