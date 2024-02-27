<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiTestController;
use App\Livewire\Counter;
use App\Http\Controllers\Api_crudsController;
use App\Http\Controllers\WebHookHandler;
use App\Models\Api_crud;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::resource('api_test', ApiTestController::class);
Route::get('/creator', ApiTestController::class .'@creator')->name('api_test.creator');
Route::get('/get_api', ApiTestController::class .'@get_api')->name('api_test.get_api');
Route::get('/get_api2', ApiTestController::class .'@get_api2')->name('api_test.get_api2');
Route::get('/counter', Counter::class);

Route::resource('api_cruds', Api_crudsController::class);
Route::get('/create_api', Api_crudsController::class.'@create_api')->name('api_cruds.create_api');
Route::get('/index2', Api_crudsController::class.'@index2');

Route::get('/get_data', Api_crudsController::class.'@getDatatableData')->name('api_cruds.get_data');

// Route::resource('test', Api_crudsController::class);
// Route::get('/api/create', Api_crudsController::class);
// Route::get('/api/create', Api_crudsController::class);
// Route::get('/api/create', Api_crudsController::class);


Route::get('/', function () {
    return view('welcome');
});
