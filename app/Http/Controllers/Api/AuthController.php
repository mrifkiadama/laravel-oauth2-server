<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Container\Attributes\Auth;

class AuthController extends Controller
{
    public function logmeout(Request $request)
    {
        $user = $request->user();
        $accessToken = $user->token();

        DB::table('oauth_refresh_tokens')->where('access_token_id', $accessToken->id)->delete();

        $accessToken->delete();
        
        return response()->json(['message' => 'Logged out successfully'], 200);
    }

    public function differentAccount(Request $request)
    {
        Auth::logout();

        Session::put("url.intended", $request->input('current_url'));

        return redirect()->route('login');
    }
}
