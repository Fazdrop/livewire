<?php

use App\Livewire\Users;
use App\Livewire\Counter;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/counter', Counter::class);
// Route::get('/users', function(){
//     return view('users');
// });
Route::get('/users', Users::class);
