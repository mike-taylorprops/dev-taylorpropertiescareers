<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

beforeEach(function () {
    $this -> withoutMiddleware(\Illuminate\Foundation\Http\Middleware\ValidateCsrfToken::class);
    config([
        'crm.site_email_webhook_url' => 'https://portal.test/webhooks/site-contact-email',
        'crm.webhook_secret' => 'test-secret',
    ]);
    Mail::fake();
    Http::fake([
        'https://portal.test/webhooks/site-contact-email' => Http::response(['ok' => true], 200),
    ]);
});

it('posts staff contact to the portal webhook and does not send mail', function () {
    $this -> postJson('/email-employee', [
        'name' => 'Visitor Name',
        'email' => 'visitor@example.com',
        'phone' => '4105551212',
        'message' => 'Please call me.',
        'employee_id' => 9,
    ]) -> assertOk() -> assertJson(['status' => 'success']);

    Mail::assertNothingSent();

    Http::assertSent(function ($request) {
        return $request -> url() === 'https://portal.test/webhooks/site-contact-email'
            && $request['site'] === 'taylorpropertiescareers'
            && (int) $request['employee_id'] === 9
            && $request['from_email'] === 'visitor@example.com'
            && $request -> hasHeader('Authorization', 'Bearer test-secret');
    });
});
