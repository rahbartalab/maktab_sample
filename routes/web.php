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
use App\Http\Controllers\UserController;
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

Route::resource('posts', PostController::class);

//Route::get('posts/{post:slug}', [PostController::class, 'show'])
//    ->name('posts.show');

Route::resource('users', UserController::class);

//Route::get('/users/{user}/posts/{post}', [UserController::class, 'posts'])->name('users.posts');
//
//Route::get('test', function () {
//    $posts = DB::table('posts')
//        ->where('title', 'like', 'a%')
//        ->select(['title', 'user_id'])
//        ->get();
//
//    dd($posts->toArray());
//
//
//    $posts = DB::table('posts')
//        ->pluck('title');
//    dd($posts->toArray());
//});
