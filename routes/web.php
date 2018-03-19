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
    Route::get('organisations/{organisation}/issues', 'OrganisationIssuesController@index')->name('organisation.issues.index');
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('issues', 'IssuesController');
});
