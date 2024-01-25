<?php

use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;



Route::get('/',[HomeController::class,'index'])->name('home');




Route::get('/register',[RegisterController::class, 'index'])->name('registro.index');
Route::post('/register',[RegisterController::class, 'store']);

Route::get('/login',[LoginController::class, 'index'])->name('login');
Route::post('/login',[LoginController::class, 'store']);

Route::post('/logout',[LogoutController::class, 'store'])->name('logout');

Route::get('/editar-perfil',[PerfilController::class, 'index'])->name('perfil.index');
Route::post('/editar-perfil',[PerfilController::class, 'store'])->name('perfil.store');


Route::get('/{user:username}',[PostController::class,'index'])->name('post.index');
Route::get('/posts/create',[PostController::class, 'create'])->name('post.create');
Route::post('/posts',[PostController::class,'store'])->name('post.store');
Route::get('/{user:username}/posts/{post:id}',[PostController::class,'show'])->name('post.show');
Route::delete('/posts/{post}',[PostController::class, 'destroy'])->name('post.destroy');

Route::post('/{user:username}/posts/{post:id}',[ComentarioController::class,'store'])->name('comentario.store');

Route::post('/imagenes',[ImagenController::class, 'store'])->name('imagenes.store');

Route::post('/post/{post}/likes',[LikeController::class,'store'])->name('post.like.store');
Route::delete('/post/{post}/likes',[LikeController::class,'destroy'])->name('post.like.destroy');

Route::post('/{user:username}/follow',[FollowerController::class,'store'])->name('users.follow');
Route::delete('/{user:username}/follow',[FollowerController::class,'destroy'])->name('users.unfollow');


