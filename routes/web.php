<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\SalonController;
use App\Http\Livewire\AcceptEnseignant;
use App\Http\Livewire\AdminRequests;
use App\Http\Livewire\AdminSalons;
use App\Http\Livewire\AdminUsers;
use App\Http\Livewire\Post;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    
    Route::get('/redirects',[Controller::class,'index']);
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    Route::get('/post',Post::class)->name('post');
    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/admin/',[AdminController::class,'index'])->name('admin.dashboard');
        Route::get('/admin/requests',AdminRequests::class)->name('admin.requests');
        Route::get('admin/users',AdminUsers::class)->name('admin.users');
        Route::get('admin/salons',AdminSalons::class)->name('admin.salons');
    });

    Route::middleware(['auth', 'enseignant'])->group(function () {
        Route::get('/salon/create',[SalonController::class,'create'])->name('salon.create');
        Route::post('/salon/create',[SalonController::class,'store'])->name('salon.store');
    });

    
});
