<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\ApiKey;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckApiKey
{
    public function handle(Request $request, Closure $next)
    {
        $apiKeyHeader = $request->header('x-api-key');
        if (!$apiKeyHeader) {
            return response()->json(['message' => 'API Key is missing'], 401);
        }

        $apiKey = ApiKey::where('key', $apiKeyHeader)->first();
        if (!$apiKey) {
            return response()->json(['message' => 'Invalid API Key'], 401);
        }

        return $next($request);
    }
}
