<?php

use App\Http\Controllers\TournamentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/create',[TournamentController::class , "create"])->name('create');
Route::get('/',[TournamentController::class , "index"])->name('index');
Route::get('/auth/login',[TournamentController::class , "login"])->name('login');
Route::get('/tournament',[TournamentController::class , "tournament"])->name('tournament');
Route::get('/logout',[TournamentController::class , "logout"])->name('logout');
Route::get('/team',[TournamentController::class , "team"])->name('team');
Route::get('/createTeam',[TournamentController::class , "createTeam"])->name('createTeam');
Route::post('/storeTeam',[TournamentController::class , "storeTeam"])->name('storeTeam');
Route::get("/teamjoine/{id}",[TournamentController::class , "teamjoine"])->name('teamjoine');
Route::get("/admin",[TournamentController::class , "admin"])->name('admin');
Route::post('/store',[TournamentController::class , "store"])->name('store');
Route::post('/auth',[TournamentController::class , "auth"])->name('auth');
Route::get('/scoreForm/{teamId}/{eventId}',[TournamentController::class , "score"])->name('score');
Route::put('/score/{teamId}/{eventId}',[TournamentController::class , "setScore"])->name('setScore');

