<?php

use Illuminate\Support\Facades\Auth;
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
    return redirect('/home/dashboard');
});


Route::get('/home', function () {
    return redirect('/home/dashboard');
});

Auth::routes();
Route::group(['prefix' => '/home', 'middleware' => 'auth'], function(){
    Route::get('/dashboard', 'DashboardController@index');
    Route::resource('sampah', 'SampahController');
    Route::resource('produk', 'ProdukController');
    Route::get('warga/profile', 'WargaController@profile')->name('profile');
    Route::post('warga/update', 'WargaController@profileUpdate')->name('profile-update');
    Route::resource('warga', 'WargaController');
    Route::resource('setor', 'SetorSampahController');
    Route::resource('request', 'RequestSetorController');
    Route::resource('transaksi', 'TransaksiController');
    
});


// Route::get('/home', 'HomeController@index')->name('home');
