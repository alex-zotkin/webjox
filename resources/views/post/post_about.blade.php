@extends('layout')
@section('css', '/css/post/post_about.css')
@section('title', $post->title)

@section('content')

    <a href={{ route('posts') }}>
        <ion-icon class="section_back" name="arrow-back-outline"></ion-icon>
    </a>

    <div class="post">
        <img src='/imgs/{{$post->image}}' class="post_img">

        <h2>
            {{$post->title}}
            @if (!$post->isActive)
                (пост черновиках)
            @endif
        </h2>

        <p>Категории:
            @foreach ($post->categories as $category)
                <a href={{ route('category_about', ['id'=>$category->id]) }} style="background-color: whitesmoke; margin-right: 10px;">
                    {{$category->title}}
                </a>
            @endforeach
        </p>


        <p>{{$post->text}}</p>

        @if ($post->isActive)
            <p>Опубликовал {{$post->user->email}}</p>
            <p>Дата публикации {{$post->updated_at}}</p>
        @endif

        @can('admin', $post)
            <a href={{route('post_edit', ['id' => $post->id])}} class="button_green">Редактировать</a>
            <a href={{route('post_delete', ['id' => $post->id])}} class="button_red">Удалить</a>
        @endcan
    </div>

@endsection
