<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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

// For v1 Demo
Route::post('/', function(Request $request) {
    return Str::of($request->getContent())->markdown([
        'html_input' => 'strip',
        'allow_unsafe_links' => false,
    ]);
});
