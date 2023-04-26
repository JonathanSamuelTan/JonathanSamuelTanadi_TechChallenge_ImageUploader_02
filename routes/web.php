<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IMGController;

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

Route::get('/', [IMGController::class, 'index'])->name('welcome');
Route::post('/upload', [IMGController::class, 'store'])->name('upload');
Route::delete ('/delete/{id}', [IMGController::class, 'destroy'])->name('delete');