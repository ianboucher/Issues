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

Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::resource('organisations', 'OrganisationsController');
    Route::get('switch/organisations/{organisation}', 'OrganisationsController@switchOrg')->name('switch-org');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('issues/category/{issueable_type}', 'IssuesController@index');

    Route::resource('issues', 'IssuesController');
    Route::resource('bugs.issues', 'IssuesController');
    Route::resource('features.issues', 'IssuesController');
    Route::resource('tests.issues', 'IssuesController');
});
