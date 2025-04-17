<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;

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
//Home
Route::get('/', function () {
    return view('home');
});
Route::get('/index/{username}', [UserController::class, 'showIndex'])->name('index');

//Login
Route::view('/signin', 'login');

//Sign Up
Route::view('/signup', 'register');
Route::post('/signup', [UserController::class, 'signUp'])->name('signup');

//Update username
Route::post('/updateUsername', [UserController::class, 'updateUsername'])->name('updateUsername');
Route::view('/updateUsername', 'updateUsername');

//Update Email
Route::post('/updateEmail', [UserController::class, 'updateEmail'])->name('updateEmail');
Route::view('/updateEmail', 'updateEmail');

//Update password
Route::post('/updatePassword', [UserController::class, 'updatePassword'])->name('updatePassword');
Route::view('/updatePassword', 'updatePassword');

//Add task
Route::view('/addTask', 'addTask');
Route::get('/addTask', [TaskController::class, 'addNewTaskRedirect'])->name('addTask');
Route::post('/addTask', [TaskController::class, 'addTask'])->name('task.addTask');

//Edit task
Route::get('/editTask/{id}', [TaskController::class, 'showEditForm']);
Route::post('/editTask', [TaskController::class, 'editTask'])->name('editTask');
Route::view('/editTask', 'editTask');

//Delete task
Route::get('/deleteTask/{id}', [TaskController::class, 'deleteTask']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
