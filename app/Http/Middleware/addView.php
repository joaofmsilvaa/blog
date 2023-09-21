<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class addView
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $post = $request->route('post');

        $numberOfViews = $post->view_count;

        $post['view_count'] = $numberOfViews + 1;
        $post->update();

        return $next($request);
    }
}
