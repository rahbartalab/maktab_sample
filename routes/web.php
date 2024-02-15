<?php


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => 'home');

// 2 -> "2"
//  salam -> ???


// Route::get('auth/login'  , [AuthController::class, 'showLogin'] )
// Route::post('auth/login'  , [AuthController::class, 'submitLogin'] )


Route::prefix('auth')->controller(AuthController::class)->group(function () {
    Route::prefix('login')->group(function () {
        Route::get('/', 'showLogin');
        Route::post('/', 'submitLogin');
    });

    Route::prefix('register')->group(function () {
        Route::get('/', 'showRegister');
        Route::post('/', 'submitRegister');
    });
});


Route::get('posts', [PostController::class, 'index']);
Route::get('posts/create', [PostController::class, 'create']);
Route::post('posts', [PostController::class, 'store']);
