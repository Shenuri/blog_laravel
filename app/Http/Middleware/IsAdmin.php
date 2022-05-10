<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class IsAdmin
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
        //should register the middlware class in Kernel.php
        //add the below two lines in the mentioned places in Kernal.php to register the middleware
        //'admin' => IsAdmin::class,  ---> under  protected $routeMiddleware = [


         //if(auth()->user()->role==ADMIN) ---> can use both codes  

        if(Auth::user()->IsAdmin()){
            //redirect to admin page
            return $next($request);

        }else{
            //redirect to user page
            return back();
        }
       
    }
}
