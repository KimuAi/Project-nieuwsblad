<?php

namespace App\Http\Middleware;

use Illuminate\Cookie\Middleware\EncryptCookies as Middleware;

class EncryptCookies extends Middleware
{
    /**
     * De namen van de cookies die niet versleuteld moeten worden.
     *
     * @var array<int, string>
     */
    protected $except = [
        //
    ];
}
