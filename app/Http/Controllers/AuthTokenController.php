<?php

namespace App\Http\Controllers;

use App\Events\LoginEvent;
use Auth;
use Illuminate\Http\Request;

class AuthTokenController extends Controller
{
    public function login(Request $request)
    {
        $credentials = request(['email', 'password']);

        if (!$token = auth()->attempt($credentials))
        {
            return response()->json([], 403);
        }

        return $this->respondWithToken($token);
    }

    protected function respondWithToken($token)
    {
        event(new LoginEvent(Auth::user()));
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
