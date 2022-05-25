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
    return view('index');
});

Auth::routes();

Route::get('/', 'ViewController@index');

Route::get('/home', 'HomeController@index')->name('Admin');

Route::resource('information', 'InformationController');
Route::resource('accounts', 'AccountController');
Route::resource('skills', 'SkillController');
Route::resource('experiences', 'ExperienceController');
Route::resource('education', 'EducationController');
Route::resource('gallery', 'GalleryController');


Route::get('/{page}', 'AdminController@index');
