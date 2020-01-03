<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'http://172.30.30.75/PostBetAmount',
        'http://172.30.30.75/PostStatusAmount',
        'http://172.30.30.75/PostResultAmount',
        'http://172.30.30.75/getBalance',
        'http://172.30.30.75/Rollback',
        'http://172.30.30.75/Retry',
        'http://172.30.30.75/Register',
    ];
}
