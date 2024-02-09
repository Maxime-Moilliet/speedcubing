<?php

use App\Http\Controllers\Time\DestroyAllTimeController;
use App\Http\Controllers\Time\DestroyTimeController;
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

Route::prefix('/time')->name('time.')->group(function () {
    Route::post('/{session}', StoreTimeController::class)->name('store');
    Route::delete('/destroy/{time}', DestroyTimeController::class)->name('destroy');
    Route::delete('/destroy-all/{session}', DestroyAllTimeController::class)->name('destroyAll');
});
