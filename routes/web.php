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

// front end route
Route::get('/', 'PagesController@index');

//back end route
Route::get('/me', 'PagesController@me');

//Update profile
Route::put('/updateprofile/{id}', 'PagesController@profileUpdate');

//Update about page
Route::put('/updateaboutpage/{id}', 'PagesController@updateAboutPage');

// Update resume objective
Route::put('/updateobjective/{id}', 'PagesController@updateObjective');

Route::resource('education', 'EducationsController');
Route::get('education/{id}/delete', 'EducationsController@destroy');
Route::resource('profile', 'ProfilesController');
Route::resource('about', 'AboutsController');
Route::resource('resume', 'ResumeController');
Route::resource('experience', 'ExperiencesController');
Route::get('experience/{id}/delete', 'ExperiencesController@destroy');
Route::resource('portfolio', 'PortfoliosController');
Route::get('portfolio/{id}/delete', 'PortfoliosController@destroy');


// Revision code
Route::get('/1438', 'PagesController@home');
Route::get('/1438/about', 'PagesController@about');
Route::get('/1438/resume', 'PagesController@resume');
Route::get('/1438/portfolio', 'PagesController@portfolio');


