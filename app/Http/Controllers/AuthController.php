<?php

namespace App\Http\Controllers;

use Validator;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Firebase\JWT\ExpiredException;
use Illuminate\Support\Facades\Hash;
use Laravel\Lumen\Routing\Controller;
use App\Customer;

class AuthController extends Controller 
{

    private $request;

    protected function jwt(Customer $user) {
         $payload = [
            'iss' => "lumen-jwt", // Issuer of the token
            'sub' => $user->id, // Subject of the token
            'iat' => time(), // Time when JWT was issued. 
            'exp' => time() + intval(env('JWT_EXP')) // Expiration time
        ];
      
      // As you can see we are passing `JWT_SECRET` as the second parameter that will 
        // be used to decode the token in the future.
        
        return JWT::encode($payload, env('JWT_SECRET'));
    }


    public function __construct(Request $request) {
        $this->request = $request;
    }

    
    public function userAuthenticate(Customer $user) {
        $this->validate($this->request, [
            'email'     => 'required',
            'password'  => 'required'
        ]);

        $user = Customer::where('email', $this->request->email)->first();

        if (!$user) {
            
            return response()->json([
                'status' => 400,
                'error' => 'User does not exist.'
            ], 400);

        }
      
        // Verify the password and generate the token
        if (Hash::check($this->request->password, $user->password)) { 
            return response()->json([
                'status'  => 200,
                'message' => 'Login Successful',
                'data'    => [
                    'token' => $this->jwt($user),
                    'c' => $user->id 
                    ]
            ], 200);
        }

        return response()->json([
            'status' => 400,
            'error' => 'Login details provided does not exit.'
        ], 400);
    } 
}