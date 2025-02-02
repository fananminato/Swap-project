<?php

use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('change-password', [PasswordController::class, 'index'])->name('change-password');
Route::post('update-password', [PasswordController::class, 'update'])->name('update-password');

Route::middleware(['auth', 'checkForgotPassword'])->group(function () {
    Route::controller(UserController::class)->name('users.')->prefix('users')->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');
        Route::get('/delete/{id}', 'destroy')->name('delete');
    });

    Route::controller(ProjectController::class)->name('projects.')->prefix('projects')->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');
        Route::get('/delete/{id}', 'destroy')->name('delete');
        Route::get('change-status/{id}/{status}', 'changeStatus')->name('change-status');
        Route::post('assign-user/{id}', 'assignUser')->name('assign-user');
    });

    Route::controller(EquipmentController::class)->name('equipments.')->prefix('equipments')->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');
        Route::get('/delete/{id}', 'destroy')->name('delete');
        Route::get('change-status/{id}/{status}', 'changeStatus')->name('change-status');
        Route::get('change-usage-status/{id}/{status}', 'changeUsageStatus')->name('change-usage-status');
    });
});

