<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

// deste modo eu passo para o controlador para ele tomar conta da rota pelo metodo "index" assim podendo transportar dados do banco para dentro da home

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/artigo/{id}', [PostController::class, 'show'])->name('post.show');
