<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as Middleware;

class PreventRequestsDuringMaintenance extends Middleware
{
    /**
     * De URIs die uitgesloten moeten worden van de onderhoudsmodus.
     *
     * @var array<int, string>
     */
    protected $except = [
        //
    ];
}
