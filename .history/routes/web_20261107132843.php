<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoviesController;


//Route::get('/movies/filter/{genre?}', function ($genre = null) {
//    if ($genre) {
//        return redirect()->route('movies.index', ['genre' => $genre]);
//    }
//    return redirect()->route('movies.index');
//});

Route::resource('movies', MoviesController::class)
->only(['index', 'show','create','store']);