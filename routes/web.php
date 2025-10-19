<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CaseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AIController;

// Home route - loads dashboard index (Laravel SB Admin home)
Route::get('/', [DashboardController::class, 'index'])->name('home');

// Case management routes
Route::get('/cases', [CaseController::class, 'index'])->name('cases.index');
Route::get('/cases/create', [CaseController::class, 'create'])->name('cases.create');
Route::post('/cases', [CaseController::class, 'store'])->name('cases.store');
Route::get('/cases/{id}', [CaseController::class, 'show'])->name('cases.show');

// Alias for new case and view cases (SB Admin sidebar links)
Route::get('/new-case', [CaseController::class, 'create'])->name('new.case');
Route::get('/view-cases', [CaseController::class, 'index'])->name('view.cases');

// AI legal guidance route
Route::get('/ai-guidance', [AIController::class, 'index'])->name('ai.guidance');

// Optional admin dashboard route if needed
Route::get('/admin/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
