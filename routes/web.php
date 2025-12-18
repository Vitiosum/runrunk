<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RunController;

Route::get('/', [RunController::class, 'index']);
Route::post('/result', [RunController::class, 'result']);
