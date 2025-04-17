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
    return redirect()->route('index', ['username' => Auth::user()->username]);
});
Route::get('/index/{username}', [UserController::class, 'showIndex'])->name('index');

//Login
Route::view('/login', 'auth.login');
Route::post('/login', [UserController::class, 'login'])->name('login');;

//Sign Up
Route::view('/signup', 'auth.register');
Route::post('/signup', [UserController::class, 'signUp'])->name('signup');

// //Update username
// Route::post('/updateUsername', [UserController::class, 'updateUsername'])->name('updateUsername');
// Route::view('/updateUsername', 'updateUsername');

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
Route::get('/editTask/{id}', [TaskController::class, 'showEditForm'])->name('task.edit');
Route::post('/editTask', [TaskController::class, 'editTask'])->name('editTask');
Route::view('/editTask', 'editTask');

//Delete task
Route::delete('/deleteTask/{id}', [TaskController::class, 'deleteTask'])->name('delete.task');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login'); // or any route you want after logout
})->name('logout')->middleware('auth');