<?php

namespace App\Http\Middleware;

use App\Role;
use App\User;
use Closure;


class AdminExist
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


        if(User::all()->count() > 0){
            if(User::first()->hasRole(Role::where('name', 'admin')->first()->id)){
                redirect('login');
            }
        }

        redirect('install');

        return $next($request);
    }
}
