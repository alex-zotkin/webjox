@extends('layout')

@section('title', 'Разделы')

@section('content')

    <h1>Категории</h1>

    @can('admin')
        <a href={{route('category_create')}} class="button_green" style="margin-bottom: 15px;">Добавить новую категорию +</a>
    @endcan

    @include('category.category_list', compact('categories'))

@endsection
