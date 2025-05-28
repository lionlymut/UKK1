<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Siswa\InputPkl;
use App\Livewire\Siswa\InputPklForm;
use App\Livewire\Siswa\DaftarIndustri;
use App\Livewire\Siswa\InputIndustriForm;

Route::get('/', function () {
    return view('landing_page');
});

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'check_user_role',
    'role:siswa',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/input/pkl-create', InputPklForm::class)->name('pkl.create');
    Route::get('/input', InputPkl::class)->name('input.index');
    Route::get('/industri', DaftarIndustri::class)->name('industri.index');
    Route::get('/industri/create', InputIndustriForm::class)->name('industri.create');
});