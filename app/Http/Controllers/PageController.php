<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

    public function whyTaylor()
    {
        return view('pages.why-taylor');
    }

    public function commissionPlans(Request $request)
    {
        return view('pages.commission-plans');
    }

    public function compare()
    {
        return view('pages.compare');
    }

    public function referralCompany()
    {
        return view('pages.referral-company');
    }

    public function mentoring()
    {
        return view('pages.mentoring');
    }

    public function technology()
    {
        return view('pages.technology');
    }

    public function aboutUs()
    {
        return view('pages.about-us');
    }

    public function ourStaff()
    {
        $employees = Employee::forWebsite()->get();

        return view('pages.our-staff', compact('employees'));
    }

    public function teams()
    {
        return view('pages.teams');
    }

    public function contactUs()
    {
        return view('pages.contact-us');
    }

    public function join(Request $request)
    {
        $program = $request->query('program');

        $lead_sources = $this -> recruitingLeadSources();

        return view('pages.join', compact('program', 'lead_sources'));
    }

    private function recruitingLeadSources(): array
    {
        try {
            return DB::connection('tpuserportal')
                -> table('crm_lead_sources')
                -> where('show_on_recruiting_site', 1)
                -> orderBy('sort_order')
                -> orderBy('name')
                -> pluck('name')
                -> all();
        } catch (\Throwable $e) {
            Log::error('Failed to load CRM lead sources', ['error' => $e -> getMessage()]);

            return [];
        }
    }

    public function joinFormSubmitted(Request $request)
    {
        $firstName = $request->query('first_name');

        if ($firstName) {
            $decoded = base64_decode($firstName, true);
            $firstName = $decoded !== false ? $decoded : $firstName;
        }

        return view('pages.join-form-submitted', compact('firstName'));
    }

    public function submitContact(Request $request): JsonResponse
    {
        if ($this -> honeypotTripped($request)) {
            return response() -> json(['ok' => true]);
        }

        if (! $this -> verifyTurnstile($request)) {
            return response() -> json(['errors' => ['_' => ['Please complete the security check.']]], 422);
        }

        $validated = $request -> validate([
            'first_name' => ['required', 'string', 'max:100'],
            'last_name'  => ['required', 'string', 'max:100'],
            'email'      => ['required', 'email', 'max:191'],
            'phone'      => ['required', 'string', 'max:30'],
            'message'    => ['required', 'string', 'max:5000'],
        ], [
            'first_name.required' => 'First name is required.',
            'last_name.required'  => 'Last name is required.',
            'email.required'      => 'Email is required.',
            'email.email'         => 'Please enter a valid email address.',
            'phone.required'      => 'Phone number is required.',
            'message.required'    => 'Message is required.',
        ]);

        $this -> postToCrmWebhook('tpc_contact', $validated);

        return response() -> json(['ok' => true]);
    }

    public function submitJoin(Request $request): JsonResponse
    {
        if ($this -> honeypotTripped($request)) {
            return response() -> json(['ok' => true]);
        }

        if (! $this -> verifyTurnstile($request)) {
            return response() -> json(['errors' => ['_' => ['Please complete the security check.']]], 422);
        }

        $validated = $request -> validate([
            'first_name'       => ['required', 'string', 'max:100'],
            'last_name'        => ['required', 'string', 'max:100'],
            'email'            => ['required', 'email', 'max:191'],
            'phone'            => ['required', 'string', 'max:30'],
            'message'          => ['required', 'string', 'max:5000'],
            'how_did_you_hear' => ['nullable', 'string', 'max:100'],
        ], [
            'first_name.required' => 'First name is required.',
            'last_name.required'  => 'Last name is required.',
            'email.required'      => 'Email is required.',
            'email.email'         => 'Please enter a valid email address.',
            'phone.required'      => 'Phone number is required.',
            'message.required'    => 'Message is required.',
        ]);

        $this -> postToCrmWebhook('tpc_join', $validated);

        return response() -> json(['ok' => true]);
    }

    public function submitCommission(Request $request): JsonResponse
    {
        if ($this -> honeypotTripped($request)) {
            return response() -> json(['ok' => true]);
        }

        if (! $this -> verifyTurnstile($request)) {
            return response() -> json(['errors' => ['_' => ['Please complete the security check.']]], 422);
        }

        $validated = $request -> validate([
            'first_name' => ['required', 'string', 'max:100'],
            'last_name'  => ['required', 'string', 'max:100'],
            'email'      => ['required', 'email', 'max:191'],
            'phone'      => ['required', 'string', 'max:30'],
            'message'    => ['required', 'string', 'max:5000'],
        ], [
            'first_name.required' => 'First name is required.',
            'last_name.required'  => 'Last name is required.',
            'email.required'      => 'Email is required.',
            'email.email'         => 'Please enter a valid email address.',
            'phone.required'      => 'Phone number is required.',
            'message.required'    => 'Message is required.',
        ]);

        $this -> postToCrmWebhook('tpc_commission', $validated);

        return response() -> json(['ok' => true]);
    }

    private function honeypotTripped(Request $request): bool
    {
        return filled($request -> input('website'));
    }

    private function verifyTurnstile(Request $request): bool
    {
        $secret = config('app.turnstile_secret_key');
        if (! $secret) {
            return true;
        }
        $token = $request -> input('cf_turnstile_token');
        if (! $token) {
            return false;
        }
        try {
            $response = Http::asForm() -> post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
                'secret'   => $secret,
                'response' => $token,
                'remoteip' => $request -> ip(),
            ]);
            return $response -> json('success', false) === true;
        } catch (\Throwable) {
            return false;
        }
    }

    private function postToCrmWebhook(string $formId, array $data): void
    {
        $url    = config('crm.webhook_url');
        $secret = config('crm.webhook_secret');

        if (! $url || ! $secret) {
            return;
        }

        try {
            Http::timeout(5) -> withToken($secret) -> post($url, array_merge(['form_id' => $formId, 'site_url' => config('app.url')], $data));
        } catch (\Throwable $e) {
            Log::error('CRM webhook failed', ['error' => $e -> getMessage(), 'url' => $url]);
        }
    }
}
