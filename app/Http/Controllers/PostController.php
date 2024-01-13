<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Post;
use App\Models\Category;


/*
    Контроллер для обработки запросов о постах
*/

class PostController extends Controller
{
     //Страница списка постов
    function index(){
        $post = '';

        if(Auth::check()){
            $posts = Post::orderBy('updated_at', 'desc')->paginate(8);
        } else{
            $posts = Post::orderBy('updated_at', 'desc')->where('isActive', true)->paginate(8);
        }
        return view('post.posts', compact('posts'));
    }

    //Страница конкретной поста по индексу
    function about($id){
        $post = Post::where('id', $id)->first();
        return view('post.post_about', compact('post'));
    }

    //Страница создания поста
    function create(){
        $categories = Category::all();

        return view('post.post_create', compact('categories'));
    }

    //Обработка запроса и сохранение в бд новом посте
    function store(Request $request){
        $input = $request->validate([
            'title' => 'required',
            'image' => 'required',
            'categories' => 'required',
            'text' => 'required|max:2000',
        ]);

        $input['categories'] = array_map('intval', $input['categories']);

        $img_path = time() . $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path() . '/imgs/', $img_path);

        $post = new Post;
        $post->title = $input['title'];
        $post->image = $img_path;
        $post->text = $input['text'];
         $post->isActive = $request->input('isNotActive') != "on";
        $post->user_id = Auth::user()->id;
        $post->save();

        $post->categories()->sync( $input['categories'] );
        $post->save();

        return redirect()->route('post_about', ['id' => $post->id]);
    }

    //Редактирование поста по индексу
    function edit($id){
        $post = Post::where('id', $id)->first();
        $categories = Category::all();
        $categories_checked = array_map(fn($c) => $c['id'], $post->categories->toArray());

        return view('post.post_edit', compact('post', 'categories', 'categories_checked'));
    }

    //Сохранение информации о посте после редактирования
    function save(Request $request, $id){
        $input = $request->validate([
            'title' => 'required',
            'categories' => 'required',
            'text' => 'required|string|max:2000',
        ]);

        $input['categories'] = array_map('intval', $input['categories']);

        $post = Post::where('id', $id)->first();

        if($request->file('image')){
            $post->image = time() . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path() . '/imgs/', $post->image);
        }

        $post->title = $input['title'];
        $post->categories()->sync($input['categories'], true);
        $post->text = $input['text'];
        $post->isActive = $request->input('isNotActive') != "on";
        $post->save();

        return redirect()->route('post_about', ['id' => $id]);
    }

    //Удаление поста по индексу
    function delete($id){
        $post = Post::where('id', $id)->first();
        $img = public_path() . '/imgs/'. $post->image;

        $post->delete();

        return redirect()->route('posts');
    }
}
