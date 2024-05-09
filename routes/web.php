<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Api\V1\GuardianApi;
use App\Http\Controllers\Api\V1\NewsapiApi;
use App\Http\Controllers\CommandController;
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

Route::get('/',[HomeController::class,'index'])->name('homepage');
//Admin
Auth::routes();
Route::group(['prefix' => '/admin','middleware' => ['auth']],function (){
    Route::get('/', [AdminController::class, 'index'])->name('home');
    Route::get('/test', [AdminController::class, 'test'])->name('test');
    Route::get('/guardian', [AdminController::class, 'guardian_posts'])->name('guardian');
    Route::get('/newsapi', [AdminController::class, 'newsapi_posts'])->name('newsapi');

    // update News manually
    Route::post('guardian/update/{id}',[AdminController::class,'update_guardian'])->name('update-guardian');
    Route::post('newsapi/update/{id}',[AdminController::class,'update_newsapi'])->name('update-newsapi');
    Route::get('/command/{source}', [CommandController::class,'runCommand'])->name('manual-update');
});
//Api Resource
Route::group(['prefix' => 'api/v1'],function(){
    Route::get('guardian',[GuardianApi::class,'index']);
    Route::get('guardian/{id}',[GuardianApi::class,'showNews']);
    Route::get('newsapi',[NewsapiApi::class,'index']);
    Route::get('newsapi/{id}',[NewsapiApi::class,'showNews']);
});

