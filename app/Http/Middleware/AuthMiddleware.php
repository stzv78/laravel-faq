<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthMiddleware
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
        if ((session()->get('role')) === 'admin') {
            return $next($request);
            } else {
            // Генерим страницу с сообщением, что нет прав для
            $data = [
                'class' => 'danger',
                'message' => 'У Вас нет прав для совершения действия!',
                'text' => 'Вернуться',
                'route' => '/'
            ];
            return response()->view('templates.message', $data);
        }
    }
}
