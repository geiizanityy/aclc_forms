<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Crypt;

use Tymon\JWTAuth\Facades\JWTAuth;
use Validator;

class AuthController extends Controller
{
    //
    public function __construct() {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function login(Request $request)
    {

        $aw = $request->only('username','password');

        $validator = Validator::make($request->all(), [
            'username'         => 'required|string|',
            'password'      => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if (! $token = auth()->attempt($validator->validated())) {
            return response()->json([
                'status' => 'error',
                'message' => 'Credentials not found, check your username and password and try again.'
            ], 401);
        }
        return $this->createNewToken($token);


       /*  $credentials = $request->validate([
            'email'         => 'required|string|email',
            'password'      => 'required|string'
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if(!$user || !Hash::check($credentials['password'], $user->password)){
            return response([
                'status'    => 'error',
                'message' => 'Credentials not found, check your username and password and try again.'
            ],401);
        }

        if(!$token = JWTAuth::attempt($aw)) {
            return response([
                'status'    => 'error',
                'message' => 'Credentials not found, check your username and password and try again.'
            ],401);
        }

        $token = $user->createToken('lms')->plainTextToken;

        return response()->json([
            'user'  => $user,
            'token' => $token,
            'status' => 'success',
            'message' => 'You have successfully logged in'
        ], 200)->header('Authorization', $token); */


        /* $fields = $request->validate([
            'username'  => 'required|string',
            'password'  => 'required|string'
        ]);
        $user = User::where('username', $fields['username'])->first();

        if ($token = $this->guard()->attempt(($user))) {
            return response()->json([
                'status' => 'success'
            ], 200)->header('Authorization', $token);
        }


        return response()->json([
            'message' => 'Credentials not found, check your username and password and try again.'
        ], 401); */


    }


    /* public function me() {
        return response()->json(auth()->user());
    } */

    public function user(Request $request)
    {
        $user = User::find(Auth::user()->id);
        return response()->json([
            'status' => 'success',
            'message' => 'You have successfully authenticated',
            'user' => $user
        ]);
    }

    /* USER LOGOUT FUNCTION */
    public function logout() {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);

    }

    public function refresh()
    {
        return $this->createNewToken(auth()->refresh());
    }


    protected function createNewToken($token){
        return response()->json([
            'message'   => 'You have successfully authenticated',
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
        ]);
    }
    private function guard($username, $password)
    {
        return Auth::guard('user')->attempt(array('username' => $username, 'password' => $password));
    }

}
