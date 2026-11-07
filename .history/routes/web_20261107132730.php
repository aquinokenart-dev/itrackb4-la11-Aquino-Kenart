<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoviesController;

Route::get('/whoami', function () {
    return 'Kenart G. Aquino | Block 4C | ITRACKB4 Laravel 12';
});

Route::get('/movies/filter/{genre?}', function ($genre = null) {
    if ($genre) {
        return redirect()->route('movies.index', ['genre' => $genre]);
    }
    return redirect()->route('movies.index');
});

Route::resource('movies', MoviesController::class)
->only(['index', 'show','create','store']);