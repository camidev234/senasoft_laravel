<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use App\Models\Departamento;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index_user(){
        $departamentos = Departamento::all();
        $cargos = Cargo::all();
        return view('/user/indexUser', compact('departamentos'), compact('cargos'));
    }
    public function userSign(){

        return view('/user/signup');
    }

    public function saveUser(Request $inputs){
        $new_user = new User();

        $new_user->name = $inputs->name;
        $new_user->email = $inputs->email;
        $new_user->password = $inputs->contra;

        $arr_errores = [];
        if(!$inputs->name){
            $arr_errores[] = "Falta el nombre";
        }

        if(!$inputs->email){
            $arr_errores[] = "falta el email";
        }

        if(!$inputs->contra){
            $arr_errores[] = "falta la contraseña";
        }

        if(empty($arr_errores)){
            $new_user->save();


            return redirect()->route('user.login');
        }else{
            return redirect()->route('user.sign_up');
        }

    }

    public function userLogin(){
        return view('/user/login');
    }

    public function login(Request $request){
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Autenticación exitosa
            $user = Auth::user();

            // Guarda la variable en la sesión
            session(['user' => $user]);

            return redirect()->route('index.User');
        }

        // Autenticación fallida
        return back()->withErrors(['email' => 'Correo electrónico o contraseña incorrectos']);
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');

    }

}
