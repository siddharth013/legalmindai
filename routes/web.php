<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/cases/create', [App\Http\Controllers\CaseController::class, 'create'])->name('cases.create');
Route::post('/cases', [App\Http\Controllers\CaseController::class, 'store'])->name('cases.store');
