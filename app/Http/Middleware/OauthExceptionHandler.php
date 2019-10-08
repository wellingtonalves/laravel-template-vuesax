<?php

namespace App\Http\Middleware;

use App\Facades\Response;
use Closure;

class OauthExceptionHandler
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            $response = $next($request);

            if (isset($response->exception) && $response->exception) {
                throw $response->exception;
            }

            return $response;
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }
}
