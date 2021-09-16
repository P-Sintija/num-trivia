<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UploadTriviaController;
use App\Http\Controllers\TriviaController;
use App\Http\Controllers\ProcessAnswerController;

Route::get('/', [HomeController::class, 'index'])
    ->name('home.index');
Route::post('/trivia', [UploadTriviaController::class, 'store'])
    ->name('trivia.store');
Route::get('/trivia', [TriviaController::class, 'index'])
    ->name('trivia.index');
Route::post('/trivia/processAnswer/{id}', [ProcessAnswerController::class, 'update'])
    ->name('processAnswer.update');
