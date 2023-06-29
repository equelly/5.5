<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Mockery\Undefined;

class AdminPanelMiddleware
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
        //хелпер auth() из БД вытягивает пользователя который в данный момент с  данного устройства заходит на сайт
        
        
        if(auth()->user()->role !== 'admin'){
            redirect()->route('refusal');
        }
        /*elseif (auth()->user()->role !== 'user') {
            redirect()->route('refusal');
        }
        elseif (auth()->user()->role == '') {
            redirect()->route('refusal');
        }*/
        return $next($request);
    }
}
