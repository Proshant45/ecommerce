<?php

use Illuminate\Support\Facades\Route;


Route::middleware('role:admin')->group(function () {

    Route::get('/admin/dashboard', function () {
        return view('backend.dashboard');
    })->name('admin.dashboard');


    Route::get('/admin', function () {
        return view('auth.login');
    })->name('admin.login');

});








