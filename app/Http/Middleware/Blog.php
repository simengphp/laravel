<?php

namespace App\Http\Middleware;

use Closure;

class Blog
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!session('blog_id') && !$request->is('blog/login') && !$request->is('blog/register')) {
            return redirect('/blog/login');
        }
        return $next($request);
    }
}
