<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/*
    Контроллер страницы профиля
*/

class ProfileController extends Controller
{
    //Отображение страницы профиля
    function index(){
        $posts = Post::where('user_id', Auth::user()->id)->get();
        return view('profile.profile', compact('posts'));
    }


    //Обновление данных авторизованного пользователя
    function profile_update(Request $request){
        $inputs = $request->only(['password', 'admin']);

        //Обновление профиля, если заполнено поле ввода
        if(strlen($inputs['password']) != 0){
            Auth::user()->password = Hash::make($inputs['password']);
        }

        Auth::user()->isAdmin = $inputs['admin'] == 'admin';
        Auth::user()->save();

        return redirect()->route('posts');
    }
}
