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
        if (!session('blog_id') && !$request->is('blog/manager/login') && !$request->is('blog/manager/register')) {
            return redirect('/blog/manager/login');
        }
        return $next($request);
    }
}
