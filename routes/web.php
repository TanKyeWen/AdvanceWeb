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

// Guest routes
Route::view('/login', 'auth.login')->middleware('guest');
Route::post('/login', [UserController::class, 'login'])
    ->middleware(['guest', 'throttle:5,1'])  // Limited to 5 attempst per minute
    ->name('login');
Route::view('/signup', 'auth.register')->middleware('guest');
Route::post('/signup', [UserController::class, 'signUp'])->name('signup')->middleware('guest');

// Authenticated routes
Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return redirect()->route('index', ['username' => Auth::user()->username]);
    });
    
    // Only allow users to view their own profile
    Route::get('/index/{username}', [UserController::class, 'showIndex'])
        ->name('index')
        ->middleware('can:view-profile,username');
    
    // Update user routes
    Route::post('/updateEmail', [UserController::class, 'updateEmail'])->name('updateEmail');
    Route::view('/updateEmail', 'updateEmail');
    Route::post('/updatePassword', [UserController::class, 'updatePassword'])->name('updatePassword');
    Route::view('/updatePassword', 'updatePassword');
    
    // Task routes with policy enforcement
    Route::get('/addTask', [TaskController::class, 'addNewTaskRedirect'])
        ->name('addTask')
        ->middleware('can:create,App\Models\Task');
        
    Route::post('/addTask', [TaskController::class, 'addTask'])
        ->name('task.addTask')
        ->middleware('can:create,App\Models\Task');
    
    Route::get('/editTask/{id}', [TaskController::class, 'showEditForm'])
        ->name('task.edit')
        ->middleware(['auth', 'task.owner']);
        
    Route::post('/editTask', [TaskController::class, 'editTask'])
        ->name('editTask');
    
    Route::delete('/deleteTask/{id}', [TaskController::class, 'deleteTask'])
        ->name('delete.task')
        ->middleware(['auth', 'task.owner']);
    
    // Logout route
    Route::post('/logout', function () {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login');
    })->name('logout');
});

Auth::routes(['register' => false]); // Disable default register route if you have your own
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');