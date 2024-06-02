<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TimelineController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('timelines', TimelineController::class);
