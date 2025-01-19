<?php
use App\Http\Controllers\weather\weatherAppController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [weatherAppController::class, 'index'])->name('weatherForm');
Route::post('/weather/result', [weatherAppController::class, 'searchWeather'])->name('weatherResult');
