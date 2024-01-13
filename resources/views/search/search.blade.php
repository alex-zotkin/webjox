@extends('layout')
@section('css', '/css/search/search.css')


@section('content')

    <h1 class="search_value">Результаты по запросу: {{$value}}</h1>

    @if (count($posts) == 0 || $value == "")
        <h1>Посты по запросу не найдены</h1>
    @else
        <h1>Посты</h1>
        @include('post.post_list', compact('posts'))
    @endif


    @if (count($categories) == 0 || $value == "")
        <h1>Категории по запросу не найдены</h1>
    @else
        <h1>Категории</h1>
        @include('category.category_list', compact('categories'))
    @endif

@endsection
