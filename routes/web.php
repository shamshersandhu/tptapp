<?php

//Route::get('logout', array('uses' => 'HomeController@logout'));
//Route::Resource('home/logout','HomeController@logout');
// route to show the login form
Route::get('login', array('uses' => 'HomeController@showLogin'));
// route to process the form
Route::post('login', array('uses' => 'HomeController@doLogin'));
Route::get('logout', array('uses' => 'HomeController@doLogout'));

Route::get('/hello', function () {
    return "<h1>Test</h1>";
 });

Route::get('/', 'PagesController@index' );
    
Route::get('/users/{id}', function ($id) {
    return '<h1>This is user ' . $id. '</h1>';
 });

 Route::Resource('trucks','TruckController');
 Route::Resource('contacts','ContactController');
 Route::Resource('trips','TripController');

 Route::get('contacts/show/{id}', 'ContactController@show');

 Route::post('contacts/store', 'ContactController@store');
 Route::post('contacts/edit', 'ContactController@edit');
 Route::post('contacts/destroy', 'ContactController@destroy');
 Route::get('contacts/locations/{type}', 'ContactController@locations');
 Route::get('contacts/editcon/{id}', 'ContactController@editcon');

 Route::post('trucks/store', 'TruckController@store');
 Route::post('trucks/edit', 'TruckController@edit');
 Route::post('trucks/destroy', 'TruckController@destroy');
 Route::get('trucks/edittrk/{id}', 'TruckController@edittrk');
 Route::get('trucks/show/{id}', 'TruckController@show');
 Route::get('trucks/printtrk/{id}', 'TruckController@printtrk');


 Route::post('trips/store', 'TripController@store');
 Route::post('trips/edit', 'TripController@edit');
 Route::post('trips/destroy', 'TripController@destroy');
 Route::get('trips/edittrp/{id}', 'TripController@edittrp');
 Route::get('trips/show/{id}', 'TripController@show');
 Route::get('trips/printtrp/{id}', 'TripController@printtrp');
 Route::get('trips/getdistance/{org}/{dest}', 'TripController@getdistance');



 
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

