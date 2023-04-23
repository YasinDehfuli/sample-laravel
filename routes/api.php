<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/about',function (){
    echo 'about :))))';
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('v1')->name('v1.')->group(
    function () {
        // welcome api
        Route::get('/',function (){
           return [
               'msg' => 'welcome to api version 1',
               'urls' => [
                   config('app.url') . '/api/v1/about',
                   config('app.url') . '/api/v1/posts',
               ],
           ] ;
        });
        Route::get('/about',function (){
           return [
              'msg' => 'Developed by Amir Rimaro & Yacin',
              'deverlopers' => [
                  'Amir' => [
                      'nickname' => 'Rimaro',
                      'email' => 'amir@mj.ir'
                  ],
                  'Yacin' => [
                      'nickname' => 'Nisay',
                      'email' => 'yacin@mj.ir'
                  ]
              ]
           ] ;
        }); // about
        // posts
        Route::get('posts',[\App\Http\Controllers\API\PostApiController::class,'index'])->name('posts');
});

Route::prefix('v1.1')->name('v1.1.')->group(
    function () {
});
