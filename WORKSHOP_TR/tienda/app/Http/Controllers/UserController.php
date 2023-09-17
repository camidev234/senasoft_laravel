<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function userSign(){

        return view('/user/signup');
    }

    public function saveUser(Request $inputs){
        $new_user = new User();

        $new_user->name = $inputs->name;
        $new_user->email = $inputs->email;
        $new_user->password = $inputs->contra;

        $new_user->save();

        return $inputs;
    }
    public function userLogin(){
        return view('/user/login');
    }
}
