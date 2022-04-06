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

use Illuminate\Support\Facades\Route;

Route::get('/', 'IndexController@site');

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/Admin', 'HomeController@Admin')->middleware('Admin');
Route::get('/Officer', 'HomeController@Officer')->middleware('Officer');
Route::get('/Farmer', 'HomeController@Farmer')->middleware('Farmer');
Route::get('/Investor', 'HomeController@Investor')->middleware('Investor');
Route::get('/client', 'ServicesController@client');

Route::resource('/website', 'WebsiteController')->middleware('Admin');
Route::resource('/sponsor', 'SponsorController')->middleware('Admin');
Route::resource('/blog', 'BlogController');
Route::resource('/users', 'UsersController');
Route::resource('/calendar', 'CalendarController');
Route::resource('/market', 'MarketController');
Route::resource('/soil', 'SoilController');
Route::resource('/comment', 'CommentsController');
Route::resource('/service', 'ServicesController');
Route::resource('/support', 'SupportController');
Route::resource('/officers', 'OfficersController');
Route::resource('/investors', 'InvestorController');

Route::post('/status/{id}', ['as' => 'status', 'uses' => 'UsersController@userStatus']);
