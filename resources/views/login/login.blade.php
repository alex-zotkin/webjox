@extends('layout')
@section('title', 'Вход')

@section('content')

    <a href={{ url()->previous(); }}>
        <ion-icon class="section_back" name="arrow-back-outline"></ion-icon>
    </a>

    <form method="POST" action={{ route('login_post') }}>
        @csrf
        <h1>Вход</h1>

        @foreach ($errors->all() as $error)
        <div class="error">
                {{$error}}
            </div>
        @endforeach

        <label>
            Email:
            <input type="email" name="email" required value="{{old('email')}}">
        </label>

        <label>
            Пароль:
            <input type="password" name="password" required/>
        </label>

        <button type="submit" class="button_green">Войти</button>
    </form>


@endsection
