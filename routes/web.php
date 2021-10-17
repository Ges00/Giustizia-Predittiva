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


Route::get('/', function () {
    return view('welcome');
});

Route::get('/phpinfo', function () {
    return "phpinfo()";
});

Route::get('/home', 'HomeController@index')->name('home');
 * 
 */

Auth::routes();

// Route::group(['middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@myIndex')->name('home');
    Route::get('/home', 'HomeController@myIndex')->name('home');
    Route::get('/categorie/{id_padre}', ['as' => 'categoryChildren',
        'uses' => 'CategoryController@children']);
    Route::resource('sentenza', 'SentenzaController');
    //ROUTE PER L'AUTENTICAZIONE DELL'ADMIN CREATE DA DIEGO BERARDI
    Route::get('user/login', ['as' => 'user.login', 'uses' => 'AuthController@authentication']); 
    Route::post('user/login', ['as' => 'user.login', 'uses' => 'AuthController@login']); 
    Route::get('user/logout', ['as' => 'user.logout', 'uses' => 'AuthController@logout']);
    Route::get('user/login', ['as' => 'user.login', 'uses' => 'AuthController@authentication']); 

//});

//Route::get('/', 'HomeController@index')->name('home');
//Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/categorie/{id_padre}', ['as' => 'categoryChildren',
//        'uses' => 'CategoryController@children']);
//Route::resource('sentenza', 'SentenzaController');
