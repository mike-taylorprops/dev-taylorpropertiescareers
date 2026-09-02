<?php

return [
    'webhook_url'              => env('CRM_WEBHOOK_URL', ''),
    'webhook_secret'           => env('CRM_WEBHOOK_SECRET', ''),
    'visit_webhook_url'        => env('CRM_VISIT_WEBHOOK_URL', ''),
    'site_email_webhook_url'   => env('CRM_SITE_EMAIL_WEBHOOK_URL', ''),
];
