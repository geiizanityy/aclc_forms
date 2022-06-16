<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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

        if(!$user || !Hash::check($fields['password'], $user->password))
        {
            return response([
                'message' => 'Credentials not found'
            ],401);
        }else {
            return response($user->usertype_id);
           /*  if($user->usertype_id === 1) {
                return response('Admin');
            }else if($user->usertype_id === 2) {
                return response('Teacher');
            }else {
                return response('Student');
            } */
            /* return response([
                'message' => 'Logged in',
                'user_type' => $user->usertype_id
            ],200);
 */
        }
    }

    public function user() {

    }

    /* USER LOGOUT FUNCTION */
    public function logout() {

    }
}
