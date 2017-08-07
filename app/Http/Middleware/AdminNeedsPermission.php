<?php

namespace App\Http\Middleware;

use Closure;

class AdminNeedsPermission
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

        //公共包不做权限验证
        if($request->is('common/*')){
            return $next($request);
        }
       if(checkPri($request->path())){
            if(\Request::ajax()){
                return response()->json(msg('error','您没有权限访问！'));
            }
            return redirect('admin')->with(['SYS_INFO'=>'您没有权限访问！']);
        }
        return $next($request);
    }
}
