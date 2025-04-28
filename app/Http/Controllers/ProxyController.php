<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProxyController extends Controller
{
    public function fetch(Request $request)
    {
        $targetUrl = $request->query('url');

        // Validate URL
        if (!filter_var($targetUrl, FILTER_VALIDATE_URL)) {
            return response()->json(['error' => 'Invalid URL'], 400);
        }

        try {
            // Forward the request using Laravel HTTP client
            $response = Http::withHeaders([
                'User-Agent' => 'Mozilla/5.0 (compatible; YourApp/1.0)'
            ])->get($targetUrl);
            // Return response with content and original content-type
            return response($response->body(), $response->status())
                ->withHeaders([
                    'Content-Type' => $response->header('Content-Type')
                ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Request failed: ' . $e->getMessage()], 500);
        }
    }
}
