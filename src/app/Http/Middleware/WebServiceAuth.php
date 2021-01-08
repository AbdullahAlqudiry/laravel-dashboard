<?php

namespace App\Http\Middleware;

use App\Helpers\WebServiceProvider;
use App\Models\WebService;
use Closure;
use Illuminate\Http\Request;

class WebServiceAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->header('Accept') != 'application/json') {
            return response()->json(['message' => 'unauthorized'], 401);
        }

        $webServiceProvider = new WebServiceProvider();
        $xAuth = $webServiceProvider->decryptData($request->header('X-Auth'));

        $webService = WebService::where([
            ['api_token', $xAuth],
            ['is_active', true]
        ])->first();

        if (is_null($webService)) {
            return response()->json(['message' => 'unauthorized'], 401);
        }

        $request->merge([
            'webService' => $webService
        ]);
        return $next($request);
    }
}
