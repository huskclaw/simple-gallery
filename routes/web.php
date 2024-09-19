<?php

use App\Http\Controllers\ImageController;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Facades\Route;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

$manager = new ImageManager(new Driver());

Route::get('/', [ImageController::class, 'index'])->name('index');
Route::post('/upload', [ImageController::class, 'upload'])->name('image.upload');
Route::post('/rotate', [ImageController::class, 'rotate'])->name('image.rotate');