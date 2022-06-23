<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Crypt;

class AuthController extends Controller
{
    //




    public function login(Request $request)
    {
        $fields = $request->validate([
            'username'  => 'required|string',
            'password'  => 'required|string'
        ]);
        $user = User::where('username', $fields['username'])->first();

        if (! $token = auth()->attempt($user)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);

        /* if(!$user || !Hash::check($fields['password'], $user->password))
        {
            return response([
                'message' => 'Credentials not found, check your username and password and try again.'
            ],401);
        }else {
            return response($username);

        } */
    }


    public function user() {
        return response()->json(auth()->user());
    }

    /* USER LOGOUT FUNCTION */
    public function logout() {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }

}
