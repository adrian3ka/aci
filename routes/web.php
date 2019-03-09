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
Route::get('/seed', 'SeedController@seed');
Route::get('/about', function(){
    return view('about');	
});
Route::get('candidate_users/members/{id}', 'CandidateUserController@member');
Route::resource('candidate_users', 'CandidateUserController');
Route::resource('master_hobbies', 'MasterHobbyController');
Route::resource('schedules', 'ScheduleController');
