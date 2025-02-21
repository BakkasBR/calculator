<?php

use App\Http\Controllers\CalculatorController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return inertia::render('Home');
});

Route::get('/calculator', [CalculatorController::class, 'index'])->name('calculator.index');

Route::post('/process', [CalculatorController::class, 'process'])->name('calculator.process');
