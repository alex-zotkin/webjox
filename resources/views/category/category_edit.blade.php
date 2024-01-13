@extends('layout')
@section('title', 'Редактирование ' . $category->title)

@section('content')

    <a href={{ route('categories') }}>
        <ion-icon class="section_back" name="arrow-back-outline"></ion-icon>
    </a>

    <form class="category_form" method="POST" action={{ route('category_save', ['id'=>$category->id]) }}>
        @csrf
        @foreach ($errors->all() as $error)
            <div class="error">
                {{$error}}
            </div>
        @endforeach

        <label>
            Название категории:
            <input type="text" value='{{$category->title}}' name="title" required>
        </label>

        <label>
            Описание:
            <textarea name="description" cols="50" rows="10" required>{{$category->description}}</textarea>
        </label>

        <button type="submit" class="button_green">Сохранить</button>
    </form>

@endsection
