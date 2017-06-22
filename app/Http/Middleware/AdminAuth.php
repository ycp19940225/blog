<?php

namespace App\Http\Middleware;

use App\Services\Admin\AdminLoginServicesImpl;
use Closure;

class AdminAuth
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

        $is_login = (new AdminLoginServicesImpl())->isLogin();
        if(!$is_login){
            return redirect('admin/login');
        }
        return $next($request);
    }
}
