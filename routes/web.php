<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TenantRegistrationController;

Route::group(['domain'=>config('tenancy.central_domains.0')], function(){

    Route::get('/', function () {
        return view('welcome');
    });

    Auth::routes();
    
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
    // Tenant registration route
    // Route::get('/tenants/register', [TenantRegistrationController::class, 'showRegistrationForm']);
    //Route::post('/tenants/register', [TenantRegistrationController::class, 'register'])->name('tenants.register');
    //Route::get('/tenants/index', [TenantRegistrationController::class, 'index'])->name('tenants.index');
});