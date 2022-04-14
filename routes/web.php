<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\LivrosController;
use App\Http\Controllers\PessoaController;
use App\Http\Controllers\ReservaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/home');
});

// Home
Route::get('/home', [HomeController::class, 'home']); 

// Gênero
Route::get('/lista-genero', [GeneroController::class, 'listaGenero']);

Route::get('/lista-genero/cadastro-genero', [GeneroController::class, 'cadastroGenero']);
Route::post('/lista-genero/cadastro-genero', [GeneroController::class, 'salvarGenero']);

Route::delete('/lista-genero/{id}/excluir', [GeneroController::class, 'excluir']);


// Livros 
Route::get('/lista-livros', [LivrosController::class, 'listaLivros']);

Route::get('/lista-livros/cadastro-livros', [LivrosController::class, 'cadastroLivros']);
Route::post('/lista-livros/cadastro-livros', [LivrosController::class, 'salvarLivros']);

Route::delete('/lista-livros/{id}/excluir', [LivrosController::class, 'excluir']);


// Pessoas
Route::get('/lista-pessoas', [PessoaController::class, 'listaPessoas']);

Route::get('/lista-pessoas/cadastro-pessoas', [PessoaController::class, 'cadastroPessoas']);
Route::post('/lista-pessoas/cadastro-pessoas', [PessoaController::class, 'salvarPessoas']);

Route::delete('/lista-pessoas/{id}/excluir', [PessoaController::class, 'excluir']);

// Reservas
Route::get('/lista-reservas', [ReservaController::class, 'listaReservas']);

Route::get('/lista-reservas/cadastro-reservas', [ReservaController::class, 'cadastroReservas']);
Route::post('/lista-reservas/cadastro-reservas', [ReservaController::class, 'salvarReservas']);

Route::delete('/lista-reservas/{id}/excluir', [ReservaController::class, 'excluir']);
