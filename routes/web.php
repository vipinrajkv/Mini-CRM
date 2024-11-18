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



Route::middleware(['auth', 'role:admin'])->group(function (){
Route::get('/', [App\Http\Controllers\TaskController::class, 'index'])->name('index.tasks');
Route::get('/task', [App\Http\Controllers\TaskController::class, 'index'])->name('index.tasks');
Route::resource('projects', App\Http\Controllers\ProjectController::class);
Route::resource('users', App\Http\Controllers\UserController::class);
Route::resource('clients', App\Http\Controllers\ClientController::class);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

});
Auth::routes();

Route::get('/admin', [App\Http\Controllers\UserController::class, 'index'])->name('user.list');
