<?php

namespace App\Middleware;

use Closure;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthMiddleware
{
    public function handle(RequestInterface $request, Closure $next)
    {
        // Check if user is logged in
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/');
        }

        return $next($request);
    }
}
