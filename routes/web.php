<?php

use App\Http\Controllers\HomebudgetController;
use App\Models\HomeBudget;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('homebudget.index');
// });

// Route::get('/', [HomebudgetController::class, 'index'])->name('homebudget.index');
Route::get('/index', [HomebudgetController::class, 'index'])->name('homebudget.index');
Route::post('/post', [HomebudgetController::class, 'store'])->name('homebudget.store');
Route::get('/edit/{id}', [HomebudgetController::class, 'edit'])->name('homebudget.edit');
Route::put('/edit/update/{id}', [HomebudgetController::class, 'update'])->name('homebudget.update');
Route::delete('/delete/{id}', [HomebudgetController::class, 'destroy'])->name('homebudget.delete');
