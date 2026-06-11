<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class VisitTrackingController extends Controller
{
    public function store(Request $request): Response
    {
        $url    = config('crm.visit_webhook_url');
        $secret = config('crm.webhook_secret');

        if (! $url || ! $secret || ! $request -> filled(['email', 'batch_id', 'page_url'])) {
            return response() -> noContent();
        }

        try {
            Http::timeout(3) -> withToken($secret) -> post($url, [
                'email'      => $request -> input('email'),
                'batch_id'   => $request -> input('batch_id'),
                'visitor_id' => $request -> input('visitor_id'),
                'page_url'   => $request -> input('page_url'),
                'referrer'   => $request -> input('referrer'),
                'site_url'   => config('app.url'),
                'ip'         => $request -> ip(),
                'user_agent' => substr($request -> userAgent() ?? '', 0, 500),
            ]);
        } catch (\Throwable $e) {
            Log::error('Visit tracking webhook failed', ['error' => $e -> getMessage()]);
        }

        return response() -> noContent();
    }
}
