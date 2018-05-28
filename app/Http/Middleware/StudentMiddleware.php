<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Student;

class StudentMiddleware
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
        if(Student::where('user_id', Auth::user()->id)->first())
            return $next($request);
        return redirect('/');
    }
}
