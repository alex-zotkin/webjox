<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use Illuminate\Support\Facades\Gate;

use App\Models\User;
use App\Models\Post;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        //
    ];

    public function boot(): void
    {

        //Доступ к функционалу имеют только авторизованные пользователи
        Gate::define('auth', function(User $user){
            return auth()->check();
        });

        //Доступ к функционалу имеет только админ
        Gate::define('admin', function(User $user){
            return $user->isAdmin;
        });

        //Доступ к функционалу имеет только админ
        Gate::define('moder', function(User $user){
            return auth()->check() && !$user->isAdmin;
        });
    }
}
