<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\crudController;
use Illuminate\Support\Facades\Route;

// Route::controller(adminController::class)->group(function(){
//     Route::get('/','showData')->name('home');
//     Route::get('/add','showForm')->name('showAdd');
//     Route::post('/adduser','addUser')->name('addUser');
// });


Route::resource('crud',crudController::class);