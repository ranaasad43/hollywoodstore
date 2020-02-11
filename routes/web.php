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

Route::get('/','HomeController@gethome');
// Route::get('/',function(){
// 	echo "hello";
// });

Route::middleware(['beforeLogin'])->group(function(){
	Route::get('/register','RegistrationController@index');
	Route::post('/register','RegistrationController@adduser');
	Route::get('/login','RegistrationController@getLoginPage');
	Route::post('/login','RegistrationController@userLogin');	
});

Route::get('/addfilm','FilmsController@addPage')->name('addfilm');
Route::post('/addfilm','FilmsController@store');

Route::get('/delSession','RegistrationController@logout')->name('delsession');
Route::get('/addToCart/{id}','CartController@addToCart');
Route::get('/admin-panel','AdminController@getadmin');
Route::post('/films', 'FilmsController@getFilms');
Route::get('/film/{id}', 'FilmsController@getFilm');
Route::delete('/deletefilm/{id}', 'FilmsController@destroy')->name('delfilm');
Route::get('/genre/{id}','GenreController@getGenre');
Route::get('/studio/{id}','FilmsController@getStudios');
Route::get('/films','FilmsController@showFilms');

