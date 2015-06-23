<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

/*
 * Con Route group creamos todo un grupo de rutas
 */
Route::group(array('prefix' => 'admin'), function(){
    Route::resource('user', 'UserController');
});

Route::get('/admin', function(){
   return View::make('admin.home');
});