<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Category;

/*
    Контроллер по реализации страницы поиска
    Поиск осуществляется по названиям постов, названиям категорий
*/

class SearchController extends Controller
{
    //Обработка запроса и возвращение страницы поиска и
    function index(Request $request){
        $value = $request->get('value');

        //Поиск по постам
        $posts = Post::where('title', 'like', '%' . $value . '%')->orderBy("updated_at", "desc")->get();

        //Поиск по названиям книг
        $categories = Category::where('title', 'like', '%' . $value . '%')->get();
        return view('search.search', compact('posts', 'categories', 'value'));
    }
}
