<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CaseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/cases', [CaseController::class, 'index'])->name('cases.index');
Route::get('/cases/create', [CaseController::class, 'create'])->name('cases.create');
Route::post('/cases', [CaseController::class, 'store'])->name('cases.store');
Route::get('/cases/{id}', [CaseController::class, 'show'])->name('cases.show');

Route::get('/admin/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
