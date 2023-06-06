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
// Route::get('/', function () {
//     return view('welcome');
// });
use App\Http\Controllers\Admin\MuseumController;
Route::controller(MuseumController::class)->prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('museum/create', 'add')->name('museum.add');
    Route::post('museum/create', 'create')->name('museum.create');
    Route::get('museum', 'index')->name('museum.index');
    Route::get('museum/edit', 'edit')->name('museum.edit');
    Route::post('museum/edit', 'update')->name('museum.update');
    Route::get('museum/delete', 'delete')->name('museum.delete');
}); 

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use App\Http\Controllers\MuseumController as PublicMuseumController;
Route::get('/', [PublicMuseumController::class, 'index'])->name('museum.index');
Route::get('/mlog', [PublicMuseumController::class, 'add'])->name('museum.mlog');