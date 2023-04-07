<?php

use App\Http\Controllers\GuestController;
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

Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('guests.index');
    }

    return redirect()->route('login');
})->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', [GuestController::class, 'index'])->name('guests.index');
    Route::group(['prefix' => 'guests', 'as' => 'guests.'], function () {
        Route::get('create', [GuestController::class, 'create'])->name('create');
        Route::post('store', [GuestController::class, 'store'])->name('store');
        Route::get('edit', [GuestController::class, 'edit'])->name('edit');
        Route::put('update', [GuestController::class, 'update'])->name('update');
        Route::delete('destroy/{guest}', [GuestController::class, 'destroy'])->name('destroy');
        Route::get('show/{guest}', [GuestController::class, 'show'])->name('show');
        Route::get('scan/{guest}', [GuestController::class, 'scanGuest'])->name('scan');
    });
});

require __DIR__.'/auth.php';
