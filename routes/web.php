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


Route::get('/test', function(){
	return view('hack');
});
 
Auth::routes();

Route::group([
		
		'middleware' => ['auth']

], function () {
   
	Route::get('/place/delete/{id}', 'HomeController@getDeletePlace')
			->name('delete-place');

	Route::get('/place/approve/{id}', 'HomeController@getApprovePlace')
			->name('approve-place');

	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/visiting-places/{area_code}', 'HomeController@visitingPlaces')
			->name('visiting-places');

	Route::get('/place-details/{origin_lat}/{origin_lng}/{lat}/{lng}', 'HomeController@getPlaceDetails')
			->name('place-details');

	Route::get('/add-place', 'HomeController@getAddPlace')
			->name('add-place.get');			

	Route::post('/add-place', 'HomeController@postAddPlace')
			->name('add-place');

	Route::post('/details', 'HomeController@getDetailsPage')
			->name('details');
});
