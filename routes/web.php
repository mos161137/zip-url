<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\AjaxController;
Route::pattern('id', '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
Route::resource('/', HomeController::class);
Route::resource('home', HomeController::class);
Route::resource('setting', SettingController::class);
Route::resource('ajax', AjaxController::class);
Route::any('{query}', function($id)
{
    if($id!='ajax' && $id!='home'){
        return redirect("home/$id");
    }else{
    }
});

