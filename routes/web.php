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
    return view('index', ['page' => 'Index']); 
});

Route::get('/data-tables', function () {
    return view('datatable', ['page' => 'Data Table']);
});

Route::get('/yield', function () {
    return view('yield.card');
});

/** menampilkan list data pertanyaan-pertanyaan (boleh menggunakan table html atau bootstrap card) */
Route::get('/pertanyaan', 'PertanyaanController@index'); 

/** menyimpan data baru ke tabel pertanyaan */
Route::post('/pertanyaan', 'PertanyaanController@store'); 

/** menampilkan form untuk membuat pertanyaan baru */
Route::get('/pertanyaan/create', 'PertanyaanController@create'); 

/** menampilkan detail pertanyaan dengan id tertentu */
Route::get('/pertanyaan/{pertanyaan_id}', 'PertanyaanController@show');

/** menyimpan perubahan data pertanyaan (update) untuk id tertentu */
Route::put('/pertanyaan/{pertanyaan_id}', 'PertanyaanController@update'); 

/** menghapus pertanyaand dengan id tertentu */
Route::delete('/pertanyaan/{pertanyaan_id}', 'PertanyaanController@destroy');  

/** menampilkan form untuk edit pertanyaan dengan id tertentu */
Route::get('/pertanyaan/{pertanyaan_id}/edit', 'PertanyaanController@edit'); 

/*
Route::get('/pertanyaan', function () {
    return view('form.question',['page' => 'Pertanyaan']);
});

Route::get('/pertanyaan', function () {
    return view('form.question',['page' => 'Pertanyaan']);
});

Route::get('/pertanyaan/create', function () {
    return view('form.question',['page' => 'Pertanyaan']);
});
*/

?>

