<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

/**
 * Read TRUSTED_PROXIES from .env directly. Returns '*', an array of IPs/CIDRs,
 * or null when not set. We can't use env() here - .env isn't loaded yet when
 * the withMiddleware callback fires in Laravel 11+.
 *
 * Declared as a closure (not a named function) so this file is safe to include
 * more than once without triggering a "Cannot redeclare function" fatal error.
 */
$trustedProxiesFromEnv = function (string $envPath): string|array|null {
    if (! is_readable($envPath)) {
        return null;
    }
    foreach (file($envPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) {
        $line = ltrim($line);
        if ($line === '' || $line[0] === '#') {
            continue;
        }
        if (! str_starts_with($line, 'TRUSTED_PROXIES=')) {
            continue;
        }
        $value = trim(substr($line, strlen('TRUSTED_PROXIES=')), " \t\"'");
        if ($value === '') {
            return null;
        }

        return $value === '*' ? '*' : array_map('trim', explode(',', $value));
    }

    return null;
};

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) use ($trustedProxiesFromEnv): void {
        $trustedProxies = $trustedProxiesFromEnv(dirname(__DIR__).'/.env');
        if ($trustedProxies !== null) {
            $middleware->trustProxies(
                at: $trustedProxies,
                headers: Request::HEADER_X_FORWARDED_FOR
                    | Request::HEADER_X_FORWARDED_HOST
                    | Request::HEADER_X_FORWARDED_PORT
                    | Request::HEADER_X_FORWARDED_PROTO
                    | Request::HEADER_X_FORWARDED_AWS_ELB
            );
        }
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions -> render(function (\Symfony\Component\HttpKernel\Exception\NotFoundHttpException $e, $request) {
            return redirect() -> route('home');
        });
    })->create();
