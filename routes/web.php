<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'Form GuestBook';
});

Auth::routes([
    'register'=> false,
    'reset'=> false,
    'verify'=> false,
    'confirm'=> false,
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group([
    'prefix'=>'admin',
    'as'=>'admin.',
    'middleware'=>'auth',
], function () {

    // Route for Dashboard page
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

    // Route for Profile page
    Route::get('/profil', [App\Http\Controllers\ProfilController::class, 'index'])->name('profile');
    Route::post('/profil', [App\Http\Controllers\ProfilController::class, 'save'])->name('profile.save');


});
