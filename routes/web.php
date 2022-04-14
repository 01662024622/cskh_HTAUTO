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

Route::resource('/HT01', 'HT50\InforCustomerSurveyController');

Route::resource('/sms', 'HT50\SMSController');

Route::resource('/HT02', 'HT10\CustomerFeedbackController');
Route::resource('/HT11', 'HT11\InsuranceController');


Route::resource('/insurance', 'HT11\InsuranceManagerController');
Route::resource('/insuranceReport', 'HT11\InsuranceReportController');
Route::get('/', 'HT11\InsuranceReportController@index');
Route::get('/insurance-end-point', 'HT11\InsuranceController@noInsurance');

Route::resource('/cheditor', 'CheditorController');
Route::post('cheditor/upload', 'HT11\InsuranceManagerController@upload')->name('ckeditor.upload');

Route::get('my-laravel-endpoint','HT11\InsuranceManagerController@upload');



Route::group(['prefix' => 'api/status'], function () {
    Route::get('categories/{id}', 'status\StatusController@categories');
    Route::get('HT50/accumulate/{id}', 'HT50\AccumulateController@welcomeBox');
    Route::get('HT50/accumulate/status/{id}', 'HT50\AccumulateController@status');
    Route::post('users/{id}', 'DataApi\UserApiController@status');
    Route::post('review/{id}', 'DataApi\ReportApiController@status');
    Route::post('categories/sort', 'DataApi\CategoryApiController@saveSort');

});
Route::group(['prefix' => 'api/v1'], function () {
    Route::get('posts/table', 'DataApi\PostApiController@anyData')->name('posts.api.data');
    Route::get('insurance/report/table', 'DataApi\InsuranceController@anyData')->name('report.insurance.api.data');
    Route::get('targets/table', 'DataApi\TargetApiController@anyData')->name('targets.api.data');
    Route::get('user/targets/table', 'DataApi\TargetApiController@anyDataUser')->name('targets.api.data');
    Route::get('targets/kpis/table', 'DataApi\TargetApiController@anyDataResult')->name('targets.api.data');
    Route::get('kpis/table', 'DataApi\KpiApiController@anyData')->name('kpis.api.data');
    Route::get('/analytic/table', 'DataApi\TargetApiController@analystic')->name('analystic.api.data');
    Route::get('/accumulate/table', 'DataApi\GiftCodeApiController@anyData')->name('giftCode.api.data');
    Route::get('/manager/accumulate/table', 'DataApi\GiftCodeApiController@managerGift')->name('manager.gift.api.data');
    Route::get('/gifts/table', 'DataApi\GiftCodeApiController@anyGift')->name('gift.list.api.data');
});


Route::group(['prefix' => 'HT50'], function () {
    Route::get('total/list', 'Export\ExportController@total');
    Route::get('gift/customer/total/list', 'Export\ExportController@khttTotal');
    Route::get('gift/customer/list', 'Export\ExportController@khtt');
    Route::get('list/{id}', 'Export\ExportController@export');
    Route::resource('manager/new/customer', 'HT50\ManagerGiftController');
    Route::post('manager/bg/customer', 'HT50\AccumulateController@giftBG');
    Route::resource('accumulate', 'HT50\AccumulateController');
    Route::resource('gifts', 'HT50\GiftController');
});

