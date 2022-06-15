<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Validator;

class AuthenticationController extends Controller
{
    /**
     * Check user's credential and allow signing in
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $attr = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|min:6',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!Auth::attempt($attr)) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        return response()->json([
            'token' => Auth::user()->createToken('keMakassar')->plainTextToken,
        ]);

    }

    /**
     * Logout user (Revoke the token)
     *
     * @return \Illuminate\Http\Response
     */

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Successfully logged out'
        ];
    }

    /**
     * Register new user
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $data = $request->all();

        // check if data already exist
        $user = User::where('email', $data['email'])->first();

        if ($user) {
            return response()->json([
                'message' => 'Email already exist'
            ], 400);
        }

        $user = [
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ];

        $user = User::create($user);

        $token = $user->createToken('keMakassar')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token,
        ]);
    }
}
