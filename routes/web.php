<?php

use App\Http\Controllers\adminController;
use Illuminate\Support\Facades\Route;

Route::controller(adminController::class)->group(function(){
    Route::get('/','showData')->name('home');
    Route::get('/add','showForm')->name('showAdd');
    Route::post('/adduser','addUser')->name('addUser');
});
