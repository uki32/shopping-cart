<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guard): Response
    {

        // if(Auth::guard($guard)->guest()) {
        //     if($request->ajax() || $request->wantsJson()) {
        //         return response('Unauthorized', 401);
        //     }else{
        //         Session::put('oldUrl', $request->url());
        //         return redirect()->route('signin.form');
        //     }
        // }
        // return $next($request);

        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                return redirect('/product');
            }
        }

        return $next($request);
    }
}
