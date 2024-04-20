<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Auth\ProviderController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\Admin\HomeController;

Route::get('/', [loginController::class, 'loginPage'])->name('login');


Route::get('/auth/{provider}/redirect', [ProviderController::class, 'redirect']);
Route::get('/auth/{provider}/callback', [ProviderController::class, 'callback']);

Route::middleware('authenticated')->group(function () {
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::post('upload', [FileController::class, 'uploadJsonFile'])->name('fileupload');
    Route::get('export-excel', [FileController::class, 'exportJsonFileToExcel'])->name('exportExcel');
    Route::get('deleteFile', [FileController::class, 'deleteFile'])->name('deleteFile');
});
