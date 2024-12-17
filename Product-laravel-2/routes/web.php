<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComputerController;

Route::get('/', [ComputerController::class, 'index'])->name('computer.index');
Route::get('/create', [ComputerController::class, 'create'])->name('computer.create');
Route::post('/store', [ComputerController::class, 'store'])->name('computer.store');
Route::get('/show/{id}', [ComputerController::class, 'show'])->name('computer.show');
Route::get('/edit/{id}', [ComputerController::class, 'edit'])->name('computer.edit');
Route::post('/update/{id}', [ComputerController::class, 'update'])->name('computer.update');
Route::delete('/destroy/{id}', [ComputerController::class, 'destroy'])->name('computer.destroy');



