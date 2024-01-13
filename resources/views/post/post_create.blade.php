@extends('layout')
@section('css', '/css/post/post_edit.css')
@section('title', 'Добавление поста')

@section('content')

    <a href={{ route('posts') }}>
        <ion-icon class="section_back" name="arrow-back-outline"></ion-icon>
    </a>

    <form class="post" method="POST" action={{ route('post_store') }} enctype="multipart/form-data">
        @csrf

        @foreach ($errors->all() as $error)
            <div class="error">
                {{$error}}
            </div>
        @endforeach

        <label>
            Изображение:
            <input type="file" name="image" required value="{{old('image')}}">
        </label>

        <label>
            Категория (выбор нескольких с нажатым ctrl):
            <select name="categories[]" required multiple>
                @foreach ($categories as $category)
                    <option value={{$category->id}}>
                        {{$category->title}}
                    </option>
                @endforeach
            </select>
        </label>

        <label>
            Загаловок поста:
            <input type="text" name="title" required value="{{old('title')}}">
        </label>

        <label>
            Текст:
            <textarea name="text" cols="50" rows="10" required>{{old('text')}}</textarea>
        </label>


        <label style="flex-direction: row;">
            Сохранить в черновиках
            <input style="width: 50px;" type="checkbox" name="isNotActive" @checked(old('isNotActive'))>
        </label>

        <button type="submit" class="button_green">Сохранить</button>
    </form>

@endsection
