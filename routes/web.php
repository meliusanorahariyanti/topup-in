<?php

use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\CreditController as AdminCreditController;
use App\Http\Controllers\Admin\GameController as AdminGameController;
use App\Http\Controllers\Admin\GameTypeController as AdminGameTypeController;
use App\Http\Controllers\Admin\RoleController as AdminRoleController;
use App\Http\Controllers\Admin\GenreController as AdminGenreController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\TransactionController as AdminTransactionController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/config', function () {
    Artisan::call('storage:link');
    Artisan::call(
        'migrate:fresh',
        [
            '--force' => true
        ]
    );
    Artisan::call(
        'db:seed',
        [
            '--force' => true
        ]
    );
});

Route::controller(PageController::class)->group(function(){
    Route::get('/', 'index');
    Route::get('/game/{id}/detail', 'detail');
    Route::get('/game/{id}/checkout/{credit_id}', 'checkout');
    Route::post('/game/checkout', 'checkout_now');
    Route::get('/trx/{txid}/detail', 'checkout_detail');
});

Route::middleware(['auth', 'admin'])->group(function(){
    Route::prefix('admin')->group(function(){
        Route::controller(AdminHomeController::class)->group(function(){
            Route::get('home', 'index');
        });

        Route::resource('role', AdminRoleController::class);
        Route::resource('genre', AdminGenreController::class);
        Route::resource('gametype', AdminGameTypeController::class);
        Route::resource('game', AdminGameController::class);
        
        Route::controller(AdminUserController::class)->group(function(){
            Route::get('/user', 'index');
            Route::get('/user/create', 'create');
            Route::post('/user', 'store');
            Route::get('/user/{id}/show', 'show');
            Route::get('/user/{id}/edit', 'edit');
            Route::put('/user/{id}', 'update');
            Route::delete('/user/{id}', 'delete');
            Route::get('/user/change_password', 'change_password');
            Route::put('/update_password', 'update_password');
            Route::put('/update_profile', 'update_profile');
        });

        Route::resource('credit', AdminCreditController::class);

        Route::controller(AdminTransactionController::class)->group(function(){
            Route::get('/transaction', 'index');
            Route::put('/transaction/{id}', 'update');
            Route::get('/transaction/unpaid/export', 'export_unpaid');
            Route::get('/transaction/paid/export', 'export_paid');
        });
    });
});

Auth::routes(['register' => false]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
