<link rel="stylesheet" href="/css/post/post_list.css">

<ul class="posts_list">
    @foreach ($posts as $post)
        <li  @class(['post', 'post_not_active' => !$post->isActive])>
            <a href={{ route('post_about', ['id'=>$post->id]) }}>
                <img src='/imgs/{{$post->image}}'>
            </a>
            <h2><a href={{ route('post_about', ['id'=>$post->id]) }}>
                {{$post->title}}

                @if (!$post->isActive)
                    (пост черновиках)
                @endif
                </a>
            </h2>

            <p>Категории:
                @foreach ($post->categories as $category)
                    <a href={{ route('category_about', ['id'=>$category->id]) }} style="background-color: whitesmoke; margin-right: 10px;">
                        {{$category->title}}
                    </a>
                @endforeach
            </p>


            @if ($post->isActive)
                <p>Опубликовал {{$post->user->email}}</p>
                <p>Дата публикации {{$post->updated_at}}</p>
            @endif

            @can('auth')
                <a href={{route('post_edit', ['id' => $post->id])}} class="button_green">Редактировать</a>
            @endcan
            @can('admin')
                <a href={{route('post_delete', ['id' => $post->id])}} class="button_red">Удалить</a>
            @endcan



        </li>
    @endforeach


    @if (count($posts) == 0)
        <p>Пока нет ни одного поста</p>
    @endif
</ul>
