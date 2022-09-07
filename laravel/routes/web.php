<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Markdown;

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
    $titles = DB::table('markdowns')->pluck('title', 'id');
    return view('welcome', ['titles' => $titles]);
});

Route::get('/articles/{id}', function ($id) {
    $content = Markdown::find($id);
    return view('article', ['article' => $content]);
});

Route::get('/env', function () {
    return '<pre>' . print_r($_ENV, true) . '</pre>';
});