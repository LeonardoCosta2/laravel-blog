<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SearchController;


// deste modo eu passo para o controlador para ele tomar conta da rota pelo metodo "index" assim podendo transportar dados do banco para dentro da home
Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/artigo/{id}', [PostController::class, 'show'])->name('post.show');


// ====== usado essa forma para fazer uma busca com paginacao filtrando a URL de qualquer codigo
Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::post('/find', function () {
   
    // na linha abaixo eu recupero o que foi passado dentro do input e limpo a string
    $query = addslashes(strip_tags(trim(request('q'))));
    $slug = Str::slug(Str::lower($query), '-');
    
    // na linha abaixo eu redireciono para a rota ja existente passando como paramentro o "q" contendo o que o usuario digitou no campo de busca ja com sanitize
    return redirect()->route('search', ['q' => $slug]);

})->name('find');
// =============================================================================================
