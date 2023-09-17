<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('index');
});

Route::get('/user/index_user', [UserController::class, 'index_user'])->name('index.User');
Route::get('/user/login', [UserController::class, 'userLogin'])->name('user.login');
// Route::post('/user/log')
Route::get('/user/sign-up', [UserController::class, 'userSign'])->name('user.sign_up');
Route::post('/user/save_user', [UserController::class, 'saveUser'])->name('user.save_User');
Route::post('/user/validateLog', [UserController::class, 'login'])->name('user.validate');
Route::get('/user/log_out', [UserController::class, 'logout'])->name('user.logout');

Route::get('/user/login_required', function () {
    return redirect()->route('user.login');
})->name('login_required');
