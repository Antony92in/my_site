<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', [IndexController::class, 'index']);

Route::get('/admin', function () {
    return Inertia::render('Mycomponents/Admin');
})->middleware(['auth', 'isAdmin'])->name('admin');

Route::post('/create-post', [PostController::class, 'create']);


require __DIR__.'/auth.php';
