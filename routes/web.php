<?php

use App\Models\Comment;
use App\Models\Upload;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

// Route::get('/', function (Request $request) {
//     $postingan = Upload::all();

//     $comment = new Comment;
//     $comment->comments()->create($request->all());
//     $comment->save();

//     return view('welcome', compact('postingan'));
// });

Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome');
Route::post('/welcomePost', [App\Http\Controllers\WelcomeController::class, 'welcomePost'])->name('welcomePost');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/uploadPost', [App\Http\Controllers\HomeController::class, 'uploadPost'])->name('uploadPost');
Route::get('/uploadDelete/{id}', [App\Http\Controllers\HomeController::class, 'uploadDelete'])->name('uploadDelete');
Route::patch('/uploadUpdate/{id}', [App\Http\Controllers\HomeController::class, 'uploadUpdate'])->name('uploadUpdate');