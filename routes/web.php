<?php
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UangController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('siswas', SiswaController::class);
Route::resource('uangs', UangController::class);