<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Api\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $creds = $request->only(['email','password']);

        if(!$token = Auth::attempt($creds)){
            return response()->json(['error' => 'incorect email / password'], 401);
        }

        return response()->json(['access_token' => $token], 200);
    }
}
