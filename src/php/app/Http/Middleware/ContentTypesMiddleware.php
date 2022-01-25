<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ContentTypesMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function handle(Request $request, Closure $next)
    {
        $acceptedContentTypes = config('marinetraffic.content_types');

        if (!$request->hasHeader('Accept') || !in_array($request->header('Accept'), $acceptedContentTypes)) {
            throw new \Exception("Not acceptable content type", 406);
        }

        return $next($request);
    }
}
