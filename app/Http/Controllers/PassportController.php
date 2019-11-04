<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use Auth;

/* createToken will NOT WORK, if 'HasApiTokens' is not implemented in User model */

class PassportController extends Controller
{
    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $token = $user->createToken('laravel-test')->accessToken;

        return response()->json(['token' => $token], 200);
    }

    public function login(Request $request)
    {
        $credentials = ['email' => $request->email, 'password' => $request->password];


        if (auth()->attempt($credentials)) {
            $token = Auth::user()->createToken('laravel-test')->accessToken;
            return response()->json([
                'token' => $token,
                'token_type' => 'Bearer'
            ], 200);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json(['message' => 'successfully logged out!']);
    }

    public function user(Request $request)
    {
        return $request->user()->name;
        return response()->json($request->user);
    }
}
