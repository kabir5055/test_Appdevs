<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/',[UserController::class,'index'])->name('index');
Route::get('/user-resister',[UserController::class,'UserResister'])->name('user.resister');
Route::post('/save-user-resister',[UserController::class,'SaveUserResister'])->name('save.user.resister');

Route::get('/admin-user-resister',[UserController::class,'AdminUserResister'])->name('admin.user.resister');
Route::post('/admin-save-user-resister',[UserController::class,'AdminSaveUserResister'])->name('admin.save.user.resister');

Route::get('/manage-user',[UserController::class, 'manageUser'])->name('manage.user');

Route::get('/user-login',[UserController::class, 'loginUser'])->name('user.login');
Route::post('/user-login',[UserController::class, 'checkLogin'])->name('user.login');

Route::get('/admin-user-login',[UserController::class, 'adminloginUser'])->name('admin.user.login');
Route::post('/admin-user-login',[UserController::class, 'checkLogin'])->name('admin.user.login');

Route::post('/logout',[UserController::class, 'logout'])->name('logout');



Route::get('/home',[HomeController::class, 'home'])->name('home');
Route::get('/todo',[HomeController::class, 'todo'])->name('todo');
Route::post('/new-todo',[HomeController::class, 'SaveTodo'])->name('new.todo');
Route::get('/manage-todo',[HomeController::class, 'manageTodo'])->name('manage.todo');
Route::get('/edit-todo/{id}',[HomeController::class, 'edittodo'])->name('edit.todo');
Route::post('/update-todo',[HomeController::class, 'updateTodo'])->name('update.todo');
Route::post('/delete-todo',[HomeController::class, 'deletetodo'])->name('delete.todo');
