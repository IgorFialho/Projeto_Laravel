<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoControle;

Route::get('/', [EventoControle::class, 'index'] );

Route::get('/Cadastro', [EventoControle::class, 'create']);


Route::get('/welcome', [EventoControle::class, 'welcome']);

Route::get('/main', [EventoControle::class, 'mainimg']);

Route::get('/publicacoes', [EventoControle::class, 'posts']);


Route::get('/publicar', [EventoControle::class, 'post'])->middleware('auth');

Route::post('/publicar', [EventoControle::class, 'store']);

Route::get('/dashboard', [EventoControle::class, 'dashboard'])->middleware('auth');

Route::delete('/dashboard/{id}', [EventoControle::class, 'destroy']);




