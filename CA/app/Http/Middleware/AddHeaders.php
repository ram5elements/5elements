<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Routing\Middleware;

// If Laravel >= 5.2 then delete 'use' and 'implements' of deprecated Middleware interface.
class AddHeaders implements Middleware
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        $response->header('Cache-Control','nocache, no-store, max-age=0, must-revalidate');
        $response->header('Pragma','no-cache');
        $response->header('Expires','Fri, 01 Jan 1990 00:00:00 GMT');

        return $response;
    }
}