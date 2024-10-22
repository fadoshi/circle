<?php

declare(strict_types=1);

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TenantAuthController;
use Stancl\Tenancy\Middleware\InitializeTenancyByPath;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([
    'web',
    //'tenant',
    //InitializeTenancyByPath::class,
    InitializeTenancyByDomain::class,    
    PreventAccessFromCentralDomains::class,
])->group(function () {
    Route::get('/', function () {

        $users = User::get();
  
        dd($users->toArray());
        return 'This is your multi-tenant application. The id of the current tenant is ' . tenant('id');
    });

    Route::get('/login', [TenantAuthController::class, 'login'])->name('tenant.login');
    Route::post('/login', [TenantAuthController::class, 'loginStore'])->name('tenant.login.store');
    Route::get('/register', [TenantAuthController::class, 'register'])->name('tenant.register');
    Route::post('/register', [TenantAuthController::class, 'registerStore'])->name('tenant.register.store');
    Route::post('/logout', [TenantAuthController::class, 'logout'])->name('tenant.logout');

    Route::get('/dashboard', function(){
        $users = User::get();
        return view('tenants.dashboard', ['users' => $users]);
    })->name('tenant.dashboard');

});
