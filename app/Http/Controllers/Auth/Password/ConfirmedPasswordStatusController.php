<?php

namespace App\Http\Controllers\Auth\Password;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ConfirmedPasswordStatusController extends Controller
{
    /**
     * Get the password confirmation status.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        return response()->json([
            'confirmed' => (time() - $request->session()->get('tenant.auth.password_confirmed_at', 0)) < $request->input('seconds', config('auth.password_timeout', 900)),
        ]);
    }
}

