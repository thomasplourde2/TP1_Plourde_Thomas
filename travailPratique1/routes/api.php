<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('films', 'App\Http\Controllers\FilmController@index');
Route::get('films/{id}/actors', 'App\Http\Controllers\FilmActorController@index');
Route::get('films/{id}/critics', 'App\Http\Controllers\FilmCriticController@show');
Route::post('users', 'App\Http\Controllers\UserController@store');
Route::put('users/{id}', 'App\Http\Controllers\UserController@update');
Route::get('films/{id}/scoreAverage', 'App\Http\Controllers\FilmCriticController@scoreAverage');