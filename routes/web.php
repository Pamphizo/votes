<?php

use Illuminate\Support\Facades\Route;

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
Route::get('vote/Result', [
    'uses' => 'MobileController@getVoteStatus',
    'as' => 'home.vote.status'
]);
Route::get('vote/status', [
    'uses' => 'VotingController@voteResultPage',
    'as' => 'home.vote.result'
]);
Route::get('/user/admin/register','AdminController@getRegister')->name('admin.register');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => '/home/'], function () {


//    user and admin account edition
    Route::get('profiles/change/password', [
        'uses' => 'ProfileController@changePassword',
        'as' => 'admin.getPassword'
    ]);
    Route::post('profiles/update/password', [
        'uses' => 'ProfileController@updatePassword',
        'as' => 'admin.updatePassword'
    ]);

    Route::get('profiles/view/profile', [
        'uses' => 'ProfileController@viewProfile',
        'as' => 'admin.viewProfile'
    ]);
    Route::get('profiles/getInfo', [
        'uses' => 'ProfileController@getInfo',
        'as' => 'admin.getInfo'
    ]);
    Route::post('profiles/update/info', [
        'uses' => 'ProfileController@updateInfo',
        'as' => 'admin.updateInfo'
    ]);
    Route::get('profiles/get/profile', [
        'uses' => 'ProfileController@getProfile',
        'as' => 'admin.getProfile'
    ]);
    Route::post('profiles/update/profile', [
        'uses' => 'ProfileController@updateProfile',
        'as' => 'admin.updateProfile'
    ]);
//province routes

    Route::get('province', [
        'uses' => 'ProvinceController@province',
        'as' => 'admin.province'
    ]);
    Route::get('getProvince', [
        'uses' => 'ProvinceController@getProvince',
        'as' => 'admin.getProvince'
    ]);
    Route::post('post/province', [
        'uses' => 'ProvinceController@saveProvince',
        'as' => 'admin.saveProvince'
    ]);
    Route::put('update/province', [
        'uses' => 'ProvinceController@updateProvince',
        'as' => 'admin.updateProvince'
    ]);
    Route::get('province/show/{id}', [
        'uses' => 'ProvinceController@show',
        'as' => 'admin.showProvince'
    ]);
    Route::delete('/province/delete/{id}', [
        'uses' => 'ProvinceController@delete',
        'as' => 'admin.deleteProvince'
    ]);

//district routes
    Route::get('district', [
        'uses' => 'DistrictController@district',
        'as' => 'admin.district'
    ]);
    Route::get('getDistrict', [
        'uses' => 'DistrictController@getDistrict',
        'as' => 'admin.getDistrict'
    ]);
    Route::post('post/district', [
        'uses' => 'DistrictController@saveDistrict',
        'as' => 'admin.saveDistrict'
    ]);
    Route::put('update/district', [
        'uses' => 'DistrictController@updateDistrict',
        'as' => 'admin.updateDistrict'
    ]);
    Route::get('district/show/{id}', [
        'uses' => 'DistrictController@show',
        'as' => 'admin.showDistrict'
    ]);
    Route::delete('/district/delete/{id}', [
        'uses' => 'DistrictController@delete',
        'as' => 'admin.deleteDistrict'
    ]);

//season routes
    Route::get('seasons', [
        'uses' => 'SeasonController@season',
        'as' => 'admin.season'
    ]);
    Route::get('getSeason', [
        'uses' => 'SeasonController@getSeason',
        'as' => 'admin.getSeason'
    ]);

    Route::post('post/season', [
        'uses' => 'SeasonController@saveSeason',
        'as' => 'admin.saveSeason'
    ]);
    Route::put('update/seasons', [
        'uses' => 'SeasonController@updateSeason',
        'as' => 'admin.updateSeason'
    ]);
    Route::get('season/show/{id}', [
        'uses' => 'SeasonController@show',
        'as' => 'admin.showSeason'
    ]);
    Route::delete('/seasons/delete/{id}', [
        'uses' => 'SeasonController@delete',
        'as' => 'admin.deleteSeason'
    ]);
    Route::put('seasons/activate/{id}', [
        'uses' => 'SeasonController@activate',
        'as' => 'admin.showActivate'
    ]);
    Route::put('seasons/desactivate/{id}', [
        'uses' => 'SeasonController@desactivate',
        'as' => 'admin.showDesactivate'
    ]);


    Route::get('province/district/{prov}', [
        'uses' => 'DistrictController@provinceDistrict',
        'as' => 'admin.province.district'
    ]);


    Route::get('season/candidates/{season}', [
        'uses' => 'SeasonController@seasonCandidatePage',
        'as' => 'admin.seasonCandidate'
    ]);
    Route::get('season/getCandidates/{season}', [
        'uses' => 'SeasonController@seasonGetCandidate',
        'as' => 'admin.season.getCandidate'
    ]);

    Route::post('post/candidate', [
        'uses' => 'CandidateController@saveCandidate',
        'as' => 'admin.saveCandidate'
    ]);
    Route::post('update/candidate', [
        'uses' => 'CandidateController@updateCandidate',
        'as' => 'admin.updateCandidate'
    ]);
    Route::delete('/candidate/delete/{id}', [
        'uses' => 'CandidateController@delete',
        'as' => 'admin.deleteCandidate'
    ]);
    Route::get('/candidate/show/{id}', [
        'uses' => 'CandidateController@show',
        'as' => 'admin.showCandidate'
    ]);

    Route::get('nida/api', [
        'uses' => 'PopulationController@nida',
        'as' => 'admin.nida'
    ]);
    Route::get('nida/getList', [
        'uses' => 'PopulationController@getNidaList',
        'as' => 'admin.getNidaList'
    ]);

    Route::get('Vote/registeration', [
        'uses' => 'PopulationController@population',
        'as' => 'admin.population'
    ]);
    Route::get('getRegisteration', [
        'uses' => 'PopulationController@getRegisteration',
        'as' => 'admin.getRegisteration'
    ]);
});
