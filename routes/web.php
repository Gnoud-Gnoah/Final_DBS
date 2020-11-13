<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\AdminController;

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
    return view('font-end.main');
});

Route::get('search', [SearchController::class, 'index'])->name('search');
Route::get('autocomplete', [SearchController::class, 'autocomplete'])->name('autocomplete');

Route::get('admin', [AdminController::class, 'index'])->name('admin');
Route::get('adminSearch', [AdminController::class, 'adminSearch'])->name('adminSearch');