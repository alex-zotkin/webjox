@extends('layout')
@section('css', '/css/post/post_edit.css')
@section('title', 'Редактирование ' . $post->title)

@section('content')

    <a href={{ route('posts') }}>
        <ion-icon class="section_back" name="arrow-back-outline"></ion-icon>
    </a>

    <form method="POST" action={{ route('post_save', ['id'=>$post->id]) }} enctype="multipart/form-data">
        @csrf

        @foreach ($errors->all() as $error)
            <div class="error">
                {{$error}}
            </div>
        @endforeach

        <img src='/imgs/{{$post->image}}' class="post_img"/>
        <label>
            Изображение:
            <input type="file" name="image" value='/imgs/{{$post->image}}'>
        </label>

        <label>
            Название:
            <input type="text" value='{{$post->title}}' name="title" required>
        </label>

        <label>
            Категория:
            <select name="categories[]" required multiple>
                @foreach ($categories as $category)
                    <option value={{$category->id}} @selected(in_array($category->id, $categories_checked))>
                        {{$category->title}}
                    </option>
                @endforeach
            </select>
        </label>

        <label>
            Текст:
            <textarea name="text" cols="50" rows="10" required>{{$post->text}}</textarea>
        </label>


        <label style="flex-direction: row;">
            Сохранить в черновиках
            <input style="width: 50px;" type="checkbox" name="isNotActive"  @checked(!$post->isActive)>
        </label>

        <button type="submit" class="button_green">Сохранить</button>
    </form>

@endsection
