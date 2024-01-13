@extends('layout')
@section('title', 'Профиль ' . auth()->user()->email)

@section('content')
    <a href={{ route('posts') }}>
        <ion-icon class="section_back" name="arrow-back-outline"></ion-icon>
    </a>

    <form class="author_form" method="POST" action={{ route('profile_update') }}>
        @csrf
        <h1>Изменение данных: {{auth()->user()->email}}</h1>

        <label>
            Обновление пароля:
            <input type="password" name="password">
        </label>

        {{-- <label style="flex-direction: row; width: 200px;">
            Администратор?:
            <input type="checkbox" @checked(auth()->user()->isAdmin) name="isAdmin">
        </label> --}}


        <fieldset>
            <legend>Изменить роль пользователя</legend>
            <div style="display: flex;">
              <input type="radio" id="admin" name="admin" value="admin" @checked(auth()->user()->isAdmin)/>
              <label for="admin" style="margin: 0">Администратор</label>
            </div>

            <div style="display: flex;">
              <input type="radio" id="moder" name="admin" value="moder" @checked(!auth()->user()->isAdmin)/>
              <label for="moder" style="margin: 0">Модератор</label>
            </div>

          </fieldset>


        <button type="submit" class="button_green">Сохранить</button>
    </form>

@endsection
