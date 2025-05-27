<?php

namespace App\Http\Middleware;

use Illuminate\Http\Middleware\TrustProxies as Middleware;
use Illuminate\Http\Request;

class TrustProxies extends Middleware
{
    /**
     * De vertrouwde proxyservers.
     *
     * @var array<int, string>|string|null
     */
    protected $proxies;

    /**
     * Het header-type dat wordt gebruikt om proxy-informatie op te halen.
     *
     * @var int
     */
    protected $headers = Request::HEADER_X_FORWARDED_ALL;
}
