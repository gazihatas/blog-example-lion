<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|


Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/',[PageController::class, 'index'])->name('all.post');
Route::get('/post-show/{slug}',[PageController::class, 'show'])->name('post.show');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/index',[PostController::class, 'index'])->name('index');
    Route::get('/post-add',[PostController::class, 'create'])->name('post.create');
    Route::post('/post-store',[PostController::class, 'store'])->name('post.store');
    Route::get('/post-edit{slug}',[PostController::class, 'edit'])->name('post.edit');
    Route::put('/post-update/{slug}',[PostController::class, 'update'])->name('post.update');
    Route::get('/post-delete/{id}',[PostController::class, 'destroy'])->name('post.delete');
});
