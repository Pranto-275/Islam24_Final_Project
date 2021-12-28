<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;

class UserPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->is_active==0){
            $request->session()->flash('approve_message', 'You Are Not Approved By Admin.Please Wait For Approve!!');
          return redirect('/');
        }
        return $next($request);
    }
}
