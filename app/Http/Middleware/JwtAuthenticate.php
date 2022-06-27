<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Tymon\JWTAuth\Exceptions\TokenExpiredEception;
use Tymon\JWTAuth\Facades\JWTAuth;

class JwtAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
        }catch(Exception $e) {
            if($e instanceof TokenExpiredException) {
                $newtoken = JWTAuth::parseToken()->refresh();
                return response()->json([
                    'success'   =>false,
                    'message'   =>'token_expired',
                    'token'     =>$newtoken
                ],401);
            }else if($e instanceof TokenInvalidException) {
                return response()->json(['success'=>false,'message'=>'token_invalid'],401);
            }else {
                return response()->json(['success'=>false,'message'=>'token_not_found'],401);
            }
        }
        return $next($request);
    }
}
