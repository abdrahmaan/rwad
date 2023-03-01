<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DataEntryManager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
       
        if(session()->get("user-data")->Role == "Admin" ||
         session()->get("user-data")->Role == "مدير إدخال بيانات" ||
         session()->get('user-data')->Role == "المدير المالى" ){

            return $next($request);
            
        } else {

            session()->flush();
            return redirect("/login");
        }
    }
}
