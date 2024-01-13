<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

/*
    Контроллер для работы с авторизацией, логином и регистрацией пользователей
*/

class LoginController extends Controller
{
    //Возвращение страницы логина
    function loginView(){
        if(Auth::check()){
            return redirect()->route('posts');
        }

        return view('login.login');
    }

    //Возвращение страницы регистрации
    function registrationView(){
        if(Auth::check()){
            return redirect()->route('posts');
        }

        return view('login.registration');
    }

    //Обработка запроса логина
    function login(Request $request){
        $inputs = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($inputs)){
            return redirect()->route('posts');
        }

        return redirect()->route('login')->withErrors([
            'error' => 'Неверное имя пользователя / пароль'
        ]);
    }

    //Обработка запроса регистрации
    function registration(Request $request){
        $inputs = $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        $user = new User;
        $user->email = $inputs['email'];
        $user->password = Hash::make($inputs['password']);
        $user->save();

        Auth::login($user);

        return redirect()->route('posts');
    }

    //Обработка запроса выхода
    function logout(){
        Auth::logout();
        return redirect()->route('posts');
    }

}
