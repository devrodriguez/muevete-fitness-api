<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\ExpiredException;
use App\Customer;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //dd('$token');
        // Pre-Middleware Action
        $token = $request->header('Authorization');

        if(!$token) {
            return response()->json([
                'status' => 401,
                'message' => 'Not authorized'
            ], 401);
        }

        try {
            $credentials = JWT::decode($token, env('JWT_SECRET'), ['HS256']);
        } catch (ExpiredException $ex) {
            return response()->json([
                'status' => 401,
                'message' => 'Token expired'
            ], 401);
        } catch (Exception $ex) {
            return response()->json([
                'status' => 401,
                'message' => 'An error while decoding token'
            ], 401);
        }

        $user = Customer::find($credentials->sub);

        if (!empty($user)) {
            $request->auth = $user;
        } else {
            return response()->json([
                'error' => 'Provided token is invalid.'
            ], 400);
        }

        $response = $next($request);

        // Post-Middleware Action

        return $response;
    }
}
