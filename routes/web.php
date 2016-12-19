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

Route::get('/', 'EventController@index');

Route::get('/events', 'EventController@events');

Route::get('event/create', 'EventController@create');

Route::post('event/store', 'EventController@store');

Route::get('event/{reise}', 'EventController@show')->name('anzeigen');

Route::get('event/{reise}/delete', ['as' => 'deleteEvent', 'uses' => 'EventController@destroy']);

Route::post('event/{reise}/update', 'EventController@edit');




Route::get('event/{reise}/rechnung' , 'RechnungController@create')->name('rechnungHinzufuegen');

Route::post('event/{reise}/rechnung/store', 'RechnungController@store');

Route::get('event/{reise}/rechnung/schlussrechnung', 'RechnungController@abrechnung')->name('abrechnung');

Route::get('rechnung/{rechnung}', 'RechnungController@show')->name('anzeigenRech');

Route::post('rechnung/{rechnung}/update', 'RechnungController@edit');



Route::get('event/{reise}/teilnehmer' , 'TeilnehmerController@create')->name('teilnehmerHinzufuegen');

Route::post('event/{reise}/teilnehmer/store', 'TeilnehmerController@store');




Auth::routes();


