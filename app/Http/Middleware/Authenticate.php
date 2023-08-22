<?php

namespace App\Http\Middleware;

use App\Exceptions\GeneralException;
use App\Helpers\Response;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        throw new GeneralException('unauthenticated' ,null, 401);
    }
}
