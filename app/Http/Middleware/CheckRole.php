<?php

namespace RW940cms\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$role)
    {
      $ar = explode("|",$role);

        if(!Auth::check()){
             if(in_array("admin", $ar) || in_array("diretoria", $ar)){
                 return redirect()->route('painel.login');
             }
           return redirect()->route('cadastro.index');
        }
        if(!in_array(Auth::user()->role, $ar )){
           //dd(Auth::user()->role ." |" . $role);
            return redirect()->route('cadastro.index');       
        }
        

        return $next($request);
    }
}
