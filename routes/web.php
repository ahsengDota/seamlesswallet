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

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//user management part
Route::get('/userlist', 'UserController@userList');
Route::get('/updateuser', 'UserController@updateuser');
Route::post('/updateProcess', 'UserController@updateProcess');
Route::get('/apiLogin', 'UserController@apiLogin');

//bet management
Route::get('/gamelist', 'BetController@gamelist');
Route::get('/gamedetails', 'BetController@gamedetails');
Route::get('/gamedetails_userlist', 'BetController@gamedetails_userlist');
Route::get('/gamedetails_userlist_betdetails', 'BetController@gamedetails_userlist_betdetails');
Route::get('/betdetails', 'BetController@betdetails');

//cronjob to get betsheet
Route::get('/cron/getbetsheet', 'SeamlessController@retry');

//seamless APi part
Route::post('/PostBetAmount', 'SeamlessController@checkAmount');
Route::post('/PostStatusAmount', 'SeamlessController@receiveAmount');
Route::post('/PostResultAmount', 'SeamlessController@postResult');
Route::post('/getBalance', 'SeamlessController@getBalance');
Route::post('/Rollback', 'SeamlessController@rollback');
Route::post('/Retry', 'SeamlessController@retry');

//user integration part
Route::post('/Register', 'UserController@register');

//bet details integration part (external API)
Route::post('/getbetsheet', 'UserController@getbetsheet');

//logout
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
