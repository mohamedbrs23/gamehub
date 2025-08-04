<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GameController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/game/{id}', [GameController::class, 'show'])->name('game.show');
Route::get('/game/{id}/download', [GameController::class, 'download'])->name('game.download');
Route::post('/games/{game}/screenshots', [GameController::class, 'addScreenshot'])
     ->name('games.addScreenshot');
Route::delete('/screenshots/{screenshot}', [GameController::class, 'deleteScreenshot'])
     ->name('games.deleteScreenshot');

Route::post('/games/{game}/comments', [GameController::class, 'storeComment'])->name('games.storeComment');


Route::prefix('admin/games')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::get('/create', [AdminController::class, 'create'])->name('create');
    Route::post('/', [AdminController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [AdminController::class, 'edit'])->name('edit');
    Route::put('/{id}', [AdminController::class, 'update'])->name('update');
    Route::delete('/{id}', [AdminController::class, 'destroy'])->name('destroy');

});
