<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Gate;

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
    return view('index');
});
Route::get('/index/{username}', [UserController::class, 'showIndex'])->name('index');

//Admin
Auth::routes();
Route::get('/login/admin', [LoginController::class, 'showAdminLoginForm']);
Route::get('/register/admin', [RegisterController::class,'showAdminRegisterForm']);
Route::post('/login/admin', [LoginController::class,'adminLogin']);
Route::post('/register/admin', [RegisterController::class,'createAdmin']);

Route::group(['middleware' => 'auth:admin'], function () {

    Route::view('/admin', 'admin');
   });

//Login
Route::view('/signin', 'login');

//Logout
Route::get('logout', [LoginController::class,'logout']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

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

//All Operations from PostController (somehow related to TaskController)
Route::get('/posts/viewAll', [PostController::class, 'viewAll']);
Route::get('/posts/view', [PostController::class, 'view']);
Route::get('/posts/create', [PostController::class, 'create']);
Route::get('/posts/editAll', [PostController::class, 'editAll']);
Route::get('/posts/edit', [PostController::class, 'edit']);
Route::get('/posts/delete', [PostController::class, 'delete']);
Route::get('/posts/update', [PostController::class, 'update']);
Route::get('/posts/assign', [PostController::class, 'assign']);
Route::get('/posts/markAsComplete', [PostController::class, 'markAsComplete']);
