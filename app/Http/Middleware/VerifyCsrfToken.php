<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * De URIs die uitgesloten moeten worden van CSRF-verificatie.
     *
     * @var array<int, string>
     */
    protected $except = [
        //
    ];
}
