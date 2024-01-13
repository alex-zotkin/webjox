<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

/*
    Middleware для ограничения страниц
    Доступ к разделам имеет только админ
*/

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if(!Auth::user()->isAdmin){
            return redirect()->route('posts');
        }

        return $next($request);
    }
}
