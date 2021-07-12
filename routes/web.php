<?php

use Illuminate\Support\Facades\Route;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\App;
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

Route::get('/switch/{lang}}', function($lang){
    Session::put('lang', $lang);
    return redirect()->back();
})->name('switch_lang');


Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::get('/user/logout', 'Auth\LoginController@user_logout');

Route::prefix('admin')->group(function(){
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout.submit');
});


Route::group(['middleware' => ['auth:admin'], 'prefix' => 'admin'], function () {

    Route::prefix('horses')->group(function(){
        Route::get('/', 'HorseController@index')->name('admin.horses');
        Route::get('/create', 'HorseController@show_create')->name('admin.horses.show_create');
        Route::post('/create_save', 'HorseController@create_horse')->name("admin.create.horse");
        Route::get('/del/{id?}', 'HorseController@delete_horse')->name("admin.delete.horse");
        Route::get('/{id?}', 'HorseController@show_edit')->name('admin.horses.show_edit');
        Route::post('/saved/{id}', 'HorseController@edit_horse')->name("admin.edit.horse");
    });

    Route::prefix('categories')->group(function(){
        Route::get('/', 'CategoryController@index')->name("admin.categories");
        Route::post('/create_save', 'CategoryController@create_category')->name("admin.create.category");
        Route::get('/del/{id?}', 'CategoryController@delete_category')->name("admin.delete.category");
        Route::get('/{id?}', 'CategoryController@show_edit')->name('admin.category.show_edit');
        Route::post('/saved/{id}', 'CategoryController@edit_category')->name("admin.edit.category");
    });

    Route::prefix('colors')->group(function(){
        Route::get('/', 'ColorController@index')->name("admin.colors");
        Route::post('/create_save', 'ColorController@create_color')->name("admin.create.color");
        Route::get('/del/{id?}', 'ColorController@delete_color')->name("admin.delete.color");
        Route::get('/{id?}', 'ColorController@show_edit')->name('admin.color.show_edit');
        Route::post('/saved/{id}', 'ColorController@edit_color')->name("admin.edit.color");
    });

    Route::prefix('lines')->group(function(){
        Route::get('/', 'LineController@index')->name("admin.lines");
        Route::post('/create_save', 'LineController@create_line')->name("admin.create.line");
        Route::get('/del/{id?}', 'LineController@delete_line')->name("admin.delete.line");
        Route::get('/{id?}', 'LineController@show_edit')->name('admin.line.show_edit');
        Route::post('/saved/{id}', 'LineController@edit_line')->name("admin.edit.line");
    });
});


Route::group(['middleware' => ['locale'], 'prefix' => '{locale}', 'where' => ['locale' => '[a-zA-Z]{2}']], function () {

    Route::get('/', function () {
        return view('page');
    })->name('mainpage');

    Route::get('/poroda', function () {
        return view('poroda');
    })->name('poroda');

//    Route::get('/forsale', function () {
//        return view('forsale');
//    })->name('forsale');

    Route::get('/forsale', 'HorseController@for_sale')->name('forsale');

    Route::get('/contact', function () {
        return view('contact');
    })->name('contact');

    Route::get('/konushna', function () {
        return view('konushna');
    })->name('konushna');

    Route::get('/horses/{cat_id?}', ['as'=>'show_horses', 'uses' => 'HorseController@show_horses']);
    Route::get('/horse_info/{id?}', ['as'=>'show_info', 'uses' => 'HorseController@show_info']);

//    Auth::routes();
});

Route::redirect('/', app()->getLocale());

Route::post('clients', 'ClientController@store')->name('save_client');


//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
