<?php

namespace App\Http\Controllers;

use Validator;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Firebase\JWT\ExpiredException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Laravel\Lumen\Routing\Controller;
use App\Customer;
use App\Mail\PasswordForgotten;

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

    
    public function userAuthenticate(Request $request) {
        $this->validate($request, [
            'email'     => 'required',
            'password'  => 'required'
        ]);

        $user = Customer::where('email', $request->email)->first();

        if (!$user) {
            
            return response()->json([
                'status' => 400,
                'error' => 'User does not exist.'
            ], 400);

        }
      
        // Verify the password and generate the token
        if (Hash::check($request->password, $user->password)) { 
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
            'error' => 'Login details provided does not exist.'
        ], 400);
    } 

    public function passwordForgotten(Request $request) {
        $email = $request->email;
        $customer = Customer::where('email', $request->email)->first();
        $newPass = str_random(8);
        $customer->password = Hash::make($newPass);
        $customer->save();
        $data = ['pass' => $newPass];

        $res = Mail::to($email, $customer->name)
        ->send(new PasswordForgotten($data));

        return response()->json([
            'status' => 200,
            'message' => 'Mail sent | Password recovered'
        ]);
    }
}