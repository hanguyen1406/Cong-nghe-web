<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IssueController;

Route::get('/', [IssueController::class, 'index'])->name('issue.index');
Route::get('/create', [IssueController::class, 'create'])->name('issue.create');
Route::post('/store', [IssueController::class, 'store'])->name('issue.store');
Route::get('/edit/{id}', [IssueController::class, 'edit'])->name('issue.edit');
Route::post('/update/{id}', [IssueController::class, 'update'])->name('issue.update');
Route::delete('/destroy/{id}', [IssueController::class, 'destroy'])->name('issue.destroy');



