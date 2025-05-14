<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Stub para vistas de ferias y emprendedores
Route::view('/fairs', 'fairs.index')
     ->name('fairs.index');
Route::view('/fairs/create', 'fairs.create')
     ->name('fairs.create');
Route::view('/fairs/edit', 'fairs.edit')
     ->name('fairs.edit');

Route::view('/entrepreneurs', 'entrepreneurs.index')
     ->name('entrepreneurs.index');
Route::view('/entrepreneurs/create', 'entrepreneurs.create')
     ->name('entrepreneurs.create');
Route::view('/entrepreneurs/edit', 'entrepreneurs.edit')
     ->name('entrepreneurs.edit');

require __DIR__.'/auth.php';
