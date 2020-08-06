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
    return view('index', ['page' => 'Index', 'route' => 'Home']);
});

Route::get('/data-tables', function () {
    return view('datatable', ['page' => 'Data Table', 'route' => 'Data']);
});

Route::get('/yield', function () {
    return view('yield.card');
});
