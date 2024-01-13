<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

/*
    Middleware для ограничения страниц по просмотру постов в черновиках, для неавторизованных пользователей
*/

class DraftPostMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $id = $request->id;
        $post = Post::where('id', $id)->first();

        if(!$post->isActive && !Auth::check()){
            return redirect()->route('posts');
        }

        return $next($request);
    }
}
