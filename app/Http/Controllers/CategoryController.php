<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

/*
    Контроллер для обработки запросов о разделах (категориях)
*/

class CategoryController extends Controller
{
    //Страница категории
    function index(){
        $categories = Category::all();


        return view('category.categories', compact('categories'));
    }

    //Страница конкретной категории по индексу
    function about($id){
        $category = Category::where('id', $id)->first();

        $post = '';

        if(auth()->check()){
            $posts = $category->posts;
        } else{
            $posts = $category->posts->where('isActive', true);
        }

        return view('category.category_about', compact('category', 'posts'));
    }

    //Страница создания категории
    function create(){
        return view('category.category_create');
    }

    //Обработка запроса и сохранение в бд новой категории
    function store(Request $request){
        $input = $request->validate([
            'title' => 'required|unique:categories',
            'description' => 'required|max:100'
        ]);

        $category = new Category;
        $category->title = $input['title'];
        $category->description = $input['description'];

        $category->save();

        return redirect()->route('categories');
    }

    //Редактирование категории по индексу
    function edit($id){
        $category = Category::where('id', $id)->first();
        return view('category.category_edit', compact('category'));
    }

    //Сохранение информации о категории после редактирования
    function save(Request $request, $id){
        $input = $request->validate([
            'title' => 'required',
            'description' => 'required|min:10'
        ]);

        $category = Category::where('id', $id)->first();
        $category->title = $input['title'];
        $category->description = $input['description'];

        $category->save();

        return redirect()->route('categories');
    }

    //Удаление категории по индексу
    function delete($id){
        $category = Category::where('id', $id)->first();
        $category->delete();
        return redirect()->route('categories');
    }
}
