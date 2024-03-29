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
    return view('welcome');
});		

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home')->middleware('authenticatedmiddleware');
Auth::routes();	
Route::any('/lockscreen/{id}', 'HomeController@lockscreen')->name('lockscreen')->middleware('authenticatedmiddleware');
//Logout
Auth::routes();
Route::any('/logout', 'HomeController@logout')->name('logout');

/*Players*/
Auth::routes();
Route::get('/player', 'PlayersController@index')->name('player')->middleware('authenticatedmiddleware');
Auth::routes();
Route::any('/search', 'PlayersController@search')->name('search')->middleware('authenticatedmiddleware'); 
Auth::routes();
Route::get('/registrationform', 'PlayersController@registrationform')->name('registrationform')->middleware('authenticatedmiddleware');
Auth::routes();
Route::get('/uploadlist', 'PlayersController@uploadlist')->name('uploadlist')->middleware('authenticatedmiddleware');
Auth::routes();
Route::post('/addrecord/{id}', 'PlayersController@addrecord')->name('addrecord')->middleware('authenticatedmiddleware');
Auth::routes();
Route::get('/playerpf/{id}', 'PlayersController@playerpf')->name('playerpf')->middleware('authenticatedmiddleware');
 