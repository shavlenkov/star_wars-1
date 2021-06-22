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

// API
Route::get('/api/people', function () {
    return view('api');
});

Route::get('/api/people/{id}', function ($id) {
    return view('api')->with('id', $id);
});

// CRUD
Route::resource('/people', 'App\Http\Controllers\PeopleController');
