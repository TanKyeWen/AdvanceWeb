<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

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
    return view('index');
});

Route::view('/signin', 'login');

Route::view('/signup', 'register');

Route::view('/updateEmail', 'updateEmail');

Route::view('/updateUsername', 'updateUsername');

Route::view('/updatePassword', 'updatePassword');

Route::view('/addTask', 'addTask');
Route::get('/addTask', [TaskController::class, 'addNewTaskRedirect'])->name('addTask');

Route::view('/editTask', 'editTask');
