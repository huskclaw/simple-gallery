<?php

use App\Http\Controllers\ImageController;

Route::get('/', [ImageController::class, 'index'])->name('index');
Route::post('/upload', [ImageController::class, 'upload'])->name('image.upload');
