<?php

use App\Livewire\Home;
use App\Livewire\Users;
use App\Livewire\Counter;
use App\Livewire\Contacts;
use Illuminate\Support\Facades\Route;



Route::get('/', Home::class);
Route::get('/counter', Counter::class);
Route::get('/users', Users::class);
Route::get('/contacts', Contacts::class);

