<?php

use Illuminate\Support\Facades\Route;
use TCG\Voyager\Facades\Voyager;
use App\Http\Controllers\UrlsController;

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

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/admin/listurls', [UrlsController::class, 'list'])->name('listurls')->middleware('admin.user');
Route::get('/admin/newurl', [UrlsController::class, 'new'])->name('newurl')->middleware('admin.user');
Route::post('/admin/createurl', [UrlsController::class, 'create'])->name('createurl')->middleware('admin.user');
Route::get('/admin/{url}/editurl', [UrlsController::class, 'edit'])->name('editurl')->middleware('admin.user');
Route::get('/admin/{url}/deleteurl', [UrlsController::class, 'delete'])->name('deleteurl')->middleware('admin.user');
Route::post('/admin/geturls', [UrlsController::class, 'getUrls'])->name('geturls')->middleware('admin.user');
Route::post('/admin/updateurl', [UrlsController::class, 'update'])->name('updateurl')->middleware('admin.user');
