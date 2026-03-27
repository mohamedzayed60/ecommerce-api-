<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Nette\Utils\Json;
use Symfony\Component\HttpFoundation\Response;

class CheckAge
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $age =  $request->query('age');
    
        if($age < 20) {
            return response()->json([
                "message" =>"not allowed"
            ] , 403);
        }

        return $next($request);
    }
}
