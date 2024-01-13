
<link rel="stylesheet" href="/css/category/categories.css">

<ul class="categories_list">
    @foreach ($categories as $category)
        <li class="category">
            <h1><a href={{ route('category_about', ['id'=>$category->id]) }}>
                    {{$category->title}}
                </a>
            </h1>

            <p>{{$category->description}}</p>

            @can('auth')
                <a href={{route('category_edit', ['id' => $category->id])}} class="button_green">Редактировать</a>
            @endcan

            @can('admin')
                <a href={{route('category_delete', ['id' => $category->id])}} class="button_red">Удалить</a>
            @endcan

        </li>
    @endforeach
</ul>

@if (count($categories) == 0)
    <p>Пока не добавлено ни одной категории</p>
@endif
