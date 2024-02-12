<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AuthRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{   // Auth user
    public function auth(AuthRequest $request) {
        $user = User::where('email', $request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect']
            ]);
        }

        // Logout other devices
        // if ($request->has('logout_other_devices))
        $user->tokens()->delete();

        $token = $user->createToken($request->device_name)->plainTextToken;

        return response()->json([
            'token' => $token,
            "user" => $user
        ]);

    }

    // logout user
    public function logout(Request $request) {
        
        $request->user()->tokens()->delete();
        return response()->json([
            'message' => 'success'
        ]);

    }

    // return data user
    public function me(Request $request) {
        $user = $request->user();

        return response()->json([
            'me' => $user
        ]);
    }
}
