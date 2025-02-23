<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\SalonController;
use App\Http\Livewire\AdminRequests;
use App\Http\Livewire\AdminSalons;
use App\Http\Livewire\AdminUsers;
use App\Http\Livewire\Post;
use App\Models\Comment;
use App\Models\Post as ModelsPost;
use Illuminate\Http\Request;
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

Route::get('/', [Controller::class,'welcome'])->name('welcome');
Route::get('/contact',[Controller::class,'contact'])->name('contact');
Route::post('/contact',[Controller::class,'contact_send'])->name('contact.send');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('/redirects', [Controller::class, 'index']);
    Route::get('/dashboard', [Controller::class, 'dashboard'])->name('dashboard');
    Route::get('/post', Post::class)->name('post');

    Route::prefix('/admin')->middleware('admin')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::get('/requests', AdminRequests::class)->name('admin.requests');

        Route::get('/users', AdminUsers::class)->name('admin.users');
        Route::get('/users/edit/{user_id}',[AdminController::class,'editUser'])->name('admin.users.edit');
        Route::post('/users/edit/{user_id}', [AdminController::class,'updateUser'])->name('admin.users.update');

        Route::get('/salons', AdminSalons::class)->name('admin.salons');
        Route::get('/salons/edit/{salon_id}', [AdminController::class,'editSalon'])->name('admin.salon.edit');
        Route::post('/salons/edit/{salon_id}', [AdminController::class,'updateSalon'])->name('admin.salon.update');
    });


    Route::middleware('enseignant')->prefix('/salon')->group(function () {
        Route::get('/create', [SalonController::class, 'create'])->name('salon.create');
        Route::post('/create', [SalonController::class, 'store'])->name('salon.store');
    });

    Route::prefix('/salon/{id}')->where(['id' => '[0-9]+'])->middleware('member')->group(function () {
        Route::get('/room',[SalonController::class,'room'])->name('meet');
        Route::get('/forum', [SalonController::class, 'forum'])->name('salon.forum');
        Route::get('/members', [SalonController::class, 'members'])->name('salon.members');
        Route::post('/exclude', [SalonController::class, 'exclude'])->name('exclude');
        Route::post('/delete', [SalonController::class, 'delete'])->name('salon.delete');
        Route::get('/private_chat/{receiver_id}',[SalonController::class,'chat'])->name('private_chat')->where(['receiver_id' => '[0-9]+']);
        Route::post('/exit',[SalonController::class,'exit'])->name('salon.exit');

        Route::prefix('/post/{post_id}')->middleware('post')->group(function(){
            Route::get('',function($id,$post_id){
                $post=ModelsPost::find($post_id);
                return view('custom.salon.post',[
                    'id'=>$id,
                    'post'=>$post
                ]);
            })->name('post.index');

            Route::post('',function($id,$post_id,Request $request){
                $post=ModelsPost::find($post_id);
                $post->content = $request->post;
                $post->save();
                return redirect()->route('salon.forum',$id);
            })->name('post.edit');
        });

        Route::prefix('/comment/{comment_id}')->middleware('comment')->group(function(){
            Route::get('',function($id,$comment_id){
                $comment=Comment::find($comment_id);
                return view('custom.salon.comment',[
                    'id'=>$id,
                    'comment'=>$comment
                ]);
            })->name('comment.index');

            Route::post('',function($id,$comment_id,Request $request){
                $comment=Comment::find($comment_id);
                $comment->content = $request->comment;
                $comment->save();
                return redirect()->route('salon.forum',$id);
            })->name('comment.edit');
        });
       
    });
    Route::prefix('salon/join')->group(function () {
        Route::get('', [SalonController::class, 'join_view'])->name('salon.join_view');
        Route::post('', [SalonController::class, 'join'])->name('salon.join');
    });
});

