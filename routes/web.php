<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\{
    ShowTweets
};

Route::get('tweets', ShowTweets::class)->middleware('auth')->name('tweets.show');

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
