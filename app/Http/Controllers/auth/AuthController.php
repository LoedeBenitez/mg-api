<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\PersonalAccessToken;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email',
            'password' => 'required|string|confirmed'
        ]);

        if (User::where('email', $fields['email'])->exists()) {
            $response = [
                'message' => 'Email is already taken'
            ];

            return response($response, 409);
        }

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password'])
        ]);

        // $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'message' => "The user has been registered to Arctic. Sign in now to get the full breeze!",
            'title' => "Registered Successfully!"
        ];

        return response($response, 201);
    }

    public function login(Request $request)
    {
        // $credentials = $request->only('email', 'password');
        // if (/*Auth::attempt($credentials)*/auth()->attempt($credentials)) {
        //     $user = auth();
        //     return response()->json(["user" => auth()->attempt($credentials)], 200);
        // } else {
        //     // Authentication failed
        //     return response()->json(['message' => 'Authentication failed'], 401);
        // }

        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        $user = User::where('email', '=', $fields["email"])->first();

        if (/*!$user || !Hash::check($fields['password'], $user->password)*/!auth()->attempt($fields)) {
            return response([
                'message' => "User does not exist or wrong password",
            ], 401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response()->json($response, 201);
    }

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();
        return response()->json('Successfully logout');
    }
}
