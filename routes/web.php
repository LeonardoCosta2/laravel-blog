<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SearchController;

// deste modo eu passo para o controlador para ele tomar conta da rota pelo metodo "index" assim podendo transportar dados do banco para dentro da home

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/artigo/{id}', [PostController::class, 'show'])->name('post.show');
Route::get('/search/{slug?}', [SearchController::class, 'search'])->name('search');
