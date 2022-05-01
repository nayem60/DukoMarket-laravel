<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
    '/pay-via-ajax', '/sslcommerz-success','/sslcommerz-cancel','/sslcommerz-fail','/ipn',
    '/aamrpay','/aamrpay-success','/aamrpay-fail',
    'sslcommerz/*',
    ];
}
