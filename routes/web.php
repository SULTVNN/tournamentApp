<?php

use App\Http\Controllers\TournamentController;
use Illuminate\Support\Facades\Route;

Route::get('/create',[TournamentController::class , "create"])->name('create');
Route::get('/',[TournamentController::class , "index"])->name('index');
Route::get('/auth/login',[TournamentController::class , "login"])->name('login');
Route::get('/tournament',[TournamentController::class , "tournament"])->name('tournament');
Route::post('/store',[TournamentController::class , "store"])->name('store');
Route::post('/auth',[TournamentController::class , "auth"])->name('auth');
