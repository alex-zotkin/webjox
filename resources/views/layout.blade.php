<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/layout.css">

    <link rel="stylesheet" href=@yield('css')>
    <title>@yield('title') —  webjox</title>
</head>
<body>

    <header>
        <div class="header_center">
            <ul>
                <li><a href={{ route('posts')}}>Посты</a></li>
                <li><a href={{ route('categories')}}>Категории</a></li>

                <form action="/search" method="GET">
                    <input type="text" placeholder="Поиск по постам и категориям" name="value">
                </form>
            </ul>

            <ul>
                @if (auth()->check())
                    <li><a href={{route('profile')}}>Профиль ({{auth()->user()->email}})</a></li>
                    <li><a href={{route('logout')}}>Выйти</a></li>
                @else
                    <li><a href={{route('login')}}>Войти</a></li>
                    <li><a href={{route('registration')}}>Зарегистрироваться</a></li>
                @endif
            </ul>
        </div>
    </header>


    <section>
        @yield('content')
    </section>

</body>


<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</html>
