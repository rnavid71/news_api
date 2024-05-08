<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
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
    return view('welcome');
});

Auth::routes();
Route::group(['prefix' => '/admin','middleware' => ['auth']],function (){
    Route::get('/', [AdminController::class, 'index'])->name('home');
    Route::get('/test', [AdminController::class, 'test'])->name('test');
    Route::get('/guardian', [AdminController::class, 'guardian_posts'])->name('guardian');
    Route::get('/newsapi', [AdminController::class, 'newsapi_posts'])->name('newsapi');

    // update News manually
    Route::post('guardian/update/{id}',[AdminController::class,'update_guardian'])->name('update-guardian');
    Route::post('newsapi/update/{id}',[AdminController::class,'update_newsapi'])->name('update-newsapi');

});

