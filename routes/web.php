<?php

use Illuminate\Support\Facades\Route;
use App\Models\Student;
use App\Models\User;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');


Route::prefix('user')->name('user.')->group(
    function () {
        Route::get('/', [\App\Http\Controllers\UserController::class, 'index'])
            ->name('index');
        Route::get('/create', [\App\Http\Controllers\UserController::class, 'create'])
            ->name('create');
        Route::get('/edit/{user}', [\App\Http\Controllers\UserController::class, 'edit'])
            ->name('edit');
        Route::post('/update/{user}', [\App\Http\Controllers\UserController::class, 'update'])
            ->name('update');
        Route::post('/store', [\App\Http\Controllers\UserController::class, 'store'])
            ->name('store');
        Route::get('/delete/{user}', [\App\Http\Controllers\UserController::class, 'destroy'])
            ->name('delete');
    }
);
Route::prefix('post')->name('post.')->group(
    function () {
        Route::get('/', [\App\Http\Controllers\PostController::class, 'index'])
            ->name('index');
        Route::get('/create', [\App\Http\Controllers\PostController::class, 'create'])
            ->name('create');
        Route::get('/edit/{post}', [\App\Http\Controllers\PostController::class, 'edit'])
            ->name('edit');
        Route::post('/update/{post}', [\App\Http\Controllers\PostController::class, 'update'])
            ->name('update');
        Route::post('/store', [\App\Http\Controllers\PostController::class, 'store'])
            ->name('store');
        Route::get('/delete/{post}', [\App\Http\Controllers\PostController::class, 'destroy'])
            ->name('delete');

        Route::get('/{post}', [\App\Http\Controllers\PostController::class, 'show'])
            ->name('show');
    }
);
Route::prefix('car')->name('car.')->group(
    function () {
        Route::get('/', [\App\Http\Controllers\CarController::class, 'index'])
            ->name('index');
        Route::get('/create', [\App\Http\Controllers\CarController::class, 'create'])
            ->name('create');
        Route::get('/edit/{user}', [\App\Http\Controllers\CarController::class, 'edit'])
            ->name('edit');
        Route::post('/update/{user}', [\App\Http\Controllers\CarController::class, 'update'])
            ->name('update');
        Route::post('/store', [\App\Http\Controllers\CarController::class, 'store'])
            ->name('store');
        Route::get('/delete/{user}', [\App\Http\Controllers\CarController::class, 'destroy'])
            ->name('delete');
    }
);

Route::post('/commment',[\App\Http\Controllers\CommentController::class,'store'])
    ->name('comment.store');
Route::get('/comment/status/{comment}/{status}',[\App\Http\Controllers\CommentController::class
    ,'updateStatus'])->name('comment.status');

Route::get('/cat/{category}',
    [\App\Http\Controllers\CategoryController::class,'show'])->name('cat.show');

Route::get('/test/regex',[\App\Http\Controllers\CommentController::class,'test'])->name('test.regex');
