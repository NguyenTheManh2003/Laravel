<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request; // Thêm dòng này để import lớp Request

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        // Bổ sung thêm cái này
        if (auth('admin')->guest()) {
            return $request->expectsJson() ? null : route('auth.admin');
        }
        // Kết thúc bổ sung
        return $request->expectsJson() ? null : route('login');
    }
}