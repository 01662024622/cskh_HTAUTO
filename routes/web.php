<?php

use Illuminate\Support\Facades\Route;
use \Illuminate\Support\Facades\Auth;

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

Auth::routes();


Route::get('/', function (){ return view("test");});
Route::get('/insurance-end-point', 'HT11\InsuranceController@noInsurance');

Route::resource('/cheditor', 'CheditorController');
Route::post('cheditor/upload', 'HT11\InsuranceManagerController@upload')->name('ckeditor.upload');

Route::get('my-laravel-endpoint','HT11\InsuranceManagerController@upload');


