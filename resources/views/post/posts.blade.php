@extends('layout')

@section('title', 'Посты')

@section('content')
    <h1>Посты</h1>

    @can('admin')
        <a href={{route('post_create')}} class="button_green" style="margin-bottom: 15px;">Добавить новый пост +</a>
    @endcan()

    @include('post.post_list', compact('posts'))

    {{$posts->links()}}

@endsection
