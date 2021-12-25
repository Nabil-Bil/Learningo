<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PostController;
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
    Route::get('/dashboard',[Controller::class,'dashboard'])->name('dashboard');
    Route::get('/post',Post::class)->name('post');

    Route::prefix('/admin')->middleware('admin')->group(function(){
        Route::get('/',[AdminController::class,'index'])->name('admin.dashboard');
        Route::get('/requests',AdminRequests::class)->name('admin.requests');
        Route::get('/users',AdminUsers::class)->name('admin.users');
        Route::get('/salons',AdminSalons::class)->name('admin.salons');
    });
   

    Route::middleware('enseignant')->prefix('/salon')->group(function () {
        Route::get('/create',[SalonController::class,'create'])->name('salon.create');
        Route::post('/create',[SalonController::class,'store'])->name('salon.store');
    });
    
        Route::prefix('/salon/{id}')->where(['id'=>'[0-9]+'])->middleware('member')->group(function(){
            Route::get('/forum',[SalonController::class,'forum'])->name('salon.forum');     
            Route::get('/members',[SalonController::class,'members'])->name('salon.members');  
            Route::post('/exclude',[SalonController::class,'exclude'])->name('exclude');
            Route::post('/delete',[SalonController::class,'delete'])->name('salon.delete');
            });
    Route::prefix('salon/join')->group(function(){
        Route::get('',[SalonController::class,'join_view'])->name('salon.join_view');
        Route::post('',[SalonController::class,'join'])->name('salon.join');
    });


    


    
});
