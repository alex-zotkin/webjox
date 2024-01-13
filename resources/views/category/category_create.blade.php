@extends('layout')
@section('css', '/css/category/category_edit.css')
@section('title', 'Добавление категории')

@section('content')

    <a href={{ route('categories') }}>
        <ion-icon class="section_back" name="arrow-back-outline"></ion-icon>
    </a>

    <form class="category_form" method="POST" action={{ route('category_store') }}>
        @csrf

        @foreach ($errors->all() as $error)
            <div class="error">
                {{$error}}
            </div>
        @endforeach

        <label>
            Название категории:
            <input type="text" name="title" required  value="{{old('title')}}">
        </label>

        <label>
            Описание:
            <textarea name="description" cols="50" rows="10" required>{{old('description')}}</textarea>
        </label>

        <button type="submit" class="button_green">Сохранить</button>
    </form>

@endsection
