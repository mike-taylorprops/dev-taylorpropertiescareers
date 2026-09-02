<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class EmployeeController extends Controller
{
    public function emailEmployee(Request $request): JsonResponse
    {
        $details = $request -> validate([
            'name' => 'required|string|max:120',
            'email' => 'required|email|max:160',
            'phone' => 'nullable|string|max:40',
            'message' => 'required|string|max:5000',
            'employee_id' => 'required|integer',
        ]);

        $ok = $this -> postToSiteEmailWebhook((int) $details['employee_id'], [
            'from_name'  => $details['name'],
            'from_email' => $details['email'],
            'from_phone' => $details['phone'] ?? '',
            'message'    => $details['message'],
        ]);

        if (! $ok) {
            return response() -> json([
                'status' => 'error',
                'message' => 'Something went wrong. Please try again or call us directly.',
            ], 422);
        }

        return response() -> json([
            'status' => 'success',
            'message' => 'Your message was sent.',
        ]);
    }

    /**
     * @param  array{from_name: string, from_email: string, from_phone: string, message: string}  $visitor
     */
    private function postToSiteEmailWebhook(int $employeeId, array $visitor): bool
    {
        $url    = config('crm.site_email_webhook_url');
        $secret = config('crm.webhook_secret');

        if (! $url || ! $secret) {
            Log::error('Site email webhook is not configured');

            return false;
        }

        try {
            $response = Http::timeout(10) -> withToken($secret) -> post($url, array_merge([
                'site'        => 'taylorpropertiescareers',
                'employee_id' => $employeeId,
            ], $visitor));

            return $response -> successful();
        } catch (\Throwable $e) {
            Log::error('Site email webhook failed', ['error' => $e -> getMessage(), 'url' => $url]);

            return false;
        }
    }
}
