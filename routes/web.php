<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/', [ContactController::class, 'index'])->name('index');

Route::get('/new', [ContactController::class, 'new'])->name('new');

Route::post('/store', [ContactController::class, 'store'])->name('store');

Route::get('/edit', [ContactController::class, 'edit'])->name('edit');

Route::post('/update', [ContactController::class, 'update'])->name('update');

Route::post('/delete', [ContactController::class, 'delete'])->name('delete');

