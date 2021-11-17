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
    //Route::post('/sentenza', 'SentenzaController@store')->name('sentenza.store');
    //Route::get('sentenza', ['as' => 'sentenza.confirmDestroy', 'uses' => 'SentenzaController@confirmDestroy']);
    Route::get('/sentenza/{id}/{id_padre}/edit', ['as' => 'sentenza.edit', 'uses' => 'SentenzaController@edit']);
    Route::get('/sentenza/{id}/{id_padre}/update', ['as' => 'sentenza.update', 'uses' => 'SentenzaController@update']);
    Route::get('/sentenza/{id}/{id_padre}/destroy', ['as' => 'sentenza.destroy', 'uses' => 'SentenzaController@destroy']);
    Route::get('/sentenza/{id}/{id_padre}/destroy/confirm', ['as' => 'sentenza.destroy.confirm', 'uses' => 'SentenzaController@confirmDestroy']);    
    
    // route gestione categorie
    Route::resource('categoria', 'CategoryController');
    Route::get('/categoria/{id}/destroy', ['as' => 'categoria.destroy', 'uses' => 'CategoryController@destroy']);
    Route::get('/categoria/{id}/destroy/confirm', ['as' => 'categoria.destroy.confirm', 'uses' => 'CategoryController@confirmDestroy']);       
    Route::get('/categoria/{id}/update', ['as' => 'categoria.update', 'uses' => 'CategoryController@update']);
//Route::get('/categoria/{id}/edit', ['as' => 'categoria.edit', 'uses' => 'CategoryController@edit']);

    // route gestione predizioni
    Route::resource('predizione', 'PredizioneController');
    Route::get('/predizione/{id}/{id_padre}/destroy', ['as' => 'predizione.destroy', 'uses' => 'predizioneController@destroy']);
    Route::get('/predizione/{id}/{id_padre}/destroy/confirm', ['as' => 'predizione.destroy.confirm', 'uses' => 'predizioneController@confirmDestroy']);       
    Route::get('/predizione/{id}/{id_padre}/edit', ['as' => 'predizione.edit', 'uses' => 'PredizioneController@edit']);
    Route::get('/predizione/{id}/{id_padre}/update', ['as' => 'predizione.update', 'uses' => 'PredizioneController@update']);

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
