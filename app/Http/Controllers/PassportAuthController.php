<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PassportAuthController extends Controller
{

    /**
     * register user for the application
     */

    public function register(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password'=> 'required'
        ]);
        $user = User::create([
            'name'=> $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $access_token_example = $user->createToken('PassportEx')->access_token;
        return response()->json(['token'=>$access_token_example], 200);
    }
    /**
     * login user to out application
     */
    public function login(Request $request) {
        $login_credentials= [
            'email' => $request->email,
            'password' => $request->passport,
        ];


        if(auth()->attempt($login_credentials)){
            //generae the token for the user
            $user_login_token= auth()->user()->createToken('PassportExample@Section.io')->accessToken;
            //now return this token on success login attempt
            return response()->json(['token' => $user_login_token], 200);
        }
        else{
            //wrong login credentials, return, user not authorised to our system, return error code 401
            return response()->json(['error' => 'UnAuthorised Access'], 401);
        }

    }
      /**
     * This method returns authenticated user details
     */
    public function authenticatedUserDetails(){
        //returns details
        return response()->json(['authenticated-user' => auth()->user()], 200);
    }
}
