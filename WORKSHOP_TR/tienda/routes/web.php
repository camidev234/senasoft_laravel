<?php

use App\Http\Controllers\CargoController;
use App\Http\Controllers\DepartamentoController;
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


route::get('/departamento/crear_dpto', [DepartamentoController::class, 'crear_dpto'])->name('dpto_crear_view');
route::post('/departamento/save_dpto', [DepartamentoController::class, 'salvar_dpto'])->name('dpto_salvar_route');
route::get('/cargo/crear_cargo', [CargoController::class, 'crear_cargo'])->name('cargo_crear_view');
route::post('/cargo/salvar_cargo', [CargoController::class, 'salvar_cargo'])->name('cargo_salvar_route');
route::delete('/departamento/eliminar_dpto/{id}', [DepartamentoController::class, 'eliminar_dpto'])->name('dpto.eliminar_route');
route::delete('/cargo/eliminar_cargo/{id}', [CargoController::class, 'eliminar_cargo'])->name('cargo.eliminar_route');
route::get('/cargo/actualizar_cargo/{id}', [CargoController::class, 'act_cargo'])->name('cargo.act_view');
route::post('/cargo/salvar_act/{id}', [CargoController::class, 'actualizar_cargo'])->name('cargo.act_route');
route::get('/departamento/act_dto/{id}', [DepartamentoController::class, 'act_dpto'])->name('dpto.act_view');
route::post('/departamento/salvar_act_dpto/{id}', [DepartamentoController::class, 'actualizar_dpto'])->name('dpto.act_route');
