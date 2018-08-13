<?php

namespace navegadorcito\Http\Middleware;

use Closure;

class IsAlumno
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
        //dd($next);
        if(auth()->User()->isAlumno()) {
            return $next($request);
        }
        return redirect('home');
        //return view('perfilAlumno');
    }
}
