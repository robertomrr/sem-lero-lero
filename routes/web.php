<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\UserCrud;
use App\Livewire\UserTable;

Route::get('/UserCrud', UserCrud::class);
Route::get('/UserTable', UserTable::class);

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
