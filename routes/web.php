<?php

use App\Http\Controllers\Time\StoreTimeController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/{session:name?}', WelcomeController::class)->name('welcome');
Route::post('/time/{session}', StoreTimeController::class)->name('time.store');
