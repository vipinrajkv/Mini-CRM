<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [App\Http\Controllers\UserController::class, 'index'])->name('index');
Route::get('/task', [App\Http\Controllers\TaskController::class, 'index'])->name('index.tasks');

Route::middleware(['auth', 'role:admin'])->group(function (){
// Route::get('/projects', [App\Http\Controllers\ProjectController::class, 'index'])->name('projects.index');
Route::resource('projects', App\Http\Controllers\ProjectController::class);
Route::resource('users', App\Http\Controllers\UserController::class);
Route::resource('clients', App\Http\Controllers\ClientController::class);
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin', [App\Http\Controllers\UserController::class, 'index'])->name('user.list');
// Route::get('/logins', [App\Http\Controllers\UserController::class, 'login'])->name('logins');
// Route::get('/registers', [App\Http\Controllers\UserController::class, 'register'])->name('registers');
