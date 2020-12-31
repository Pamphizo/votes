<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/population/login',
    'Auth\LoginController@mobileLogin')
    ->name('mobile.login');

Route::post('population/register',
    'Auth\RegisterController@mobileRegister')
    ->name('mobile.register');

Route::post('get/province', [
    'uses' => 'MobileController@getProvince',
    'as' => 'api.getProvince'
]);
Route::post('get/district', [
    'uses' => 'MobileController@getDistrict',
    'as' => 'api.getDistrict'
]);
Route::post('province/district/{id}', [
    'uses' => 'MobileController@provinceDistrict',
    'as' => 'api.provinceDistrict'
]);
Route::post('mobile/get/candidate', [
    'uses' => 'MobileController@getCurrentElection',
    'as' => 'api.getCurrentElection'
]);

Route::post('mobile/post/voting', [
    'uses' => 'MobileController@Vote',
    'as' => 'api.post.voting'
]);
Route::post('mobile/voting/result', [
    'uses' => 'MobileController@loadVoting',
    'as' => 'api.voting.result'
]);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
