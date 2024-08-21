<?php

use App\Http\Controllers\ParticipantsSportController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/club', function () {

    return view('club');

});


Route::get('/register', [ParticipantsSportController::class, 'register'])->name('register');

