<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
})->name('landing');

// Auth
Route::get('/login', fn () => view('auth.login'))->name('login');

// Dashboard (requires auth in real app)
Route::middleware(['web'])->group(function () {
    Route::get('/dashboard', fn () => view('dashboard.index'))->name('dashboard');
    
    // Clients
    Route::get('/clients', fn () => view('clients.index'))->name('clients.index');
    Route::get('/clients/{id}', fn ($id) => view('clients.show', ['id' => $id]))->name('clients.show');
    
    // Projects
    Route::get('/projects', fn () => view('projects.index'))->name('projects.index');
    Route::get('/projects/{id}', fn ($id) => view('projects.show', ['id' => $id]))->name('projects.show');
    
    // Tasks
    Route::get('/tasks', fn () => view('tasks.index'))->name('tasks.index');
    
    // Invoices
    Route::get('/invoices', fn () => view('invoices.index'))->name('invoices.index');
    Route::get('/invoices/{id}', fn ($id) => view('invoices.show', ['id' => $id]))->name('invoices.show');
    
    // Payments
    Route::get('/payments', fn () => view('payments.index'))->name('payments.index');
    
    // Team
    Route::get('/team', fn () => view('team.index'))->name('team.index');
    
    // Analytics
    Route::get('/analytics', fn () => view('analytics.index'))->name('analytics.index');
    
    // Notifications
    Route::get('/notifications', fn () => view('notifications.index'))->name('notifications.index');
    
    // Activity
    Route::get('/activity', fn () => view('activity.index'))->name('activity.index');
    
    // Settings
    Route::get('/settings', fn () => view('settings.index'))->name('settings.index');
    
    // Automation
    Route::get('/automation', fn () => view('automation.index'))->name('automation.index');
});

// Client Portal
Route::group(['prefix' => 'portal', 'as' => 'portal.'], function () {
    Route::get('/', fn () => view('portal.dashboard'))->name('dashboard');
    Route::get('/projects', fn () => view('portal.projects'))->name('projects');
    Route::get('/invoices', fn () => view('portal.invoices'))->name('invoices');
});

// Search API (simulates unified backend)
Route::get('/api/search', [\App\Http\Controllers\SearchController::class, 'index'])->name('api.search');
