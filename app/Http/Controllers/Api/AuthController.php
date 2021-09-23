<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserProfession;
use Illuminate\Http\Request;
use App\General;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
            'language' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();
        if($user){
        	return response()->json([
	        'error' => 'Email already in use'
	    	]);
        }

        $general = new General();
        $url = $general->get_gravatar($request->email);

        $user = User::create([
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'language' => $request->language,
            'avatar' => $url
        ]);

        //$user->roles()->attach(2); // Simple user role

        $authToken = $user->createToken('auth-token')->plainTextToken;

        $profs = UserProfession::all();
        $general = new General();
    	$professions = $general->getLangFromObjArray($profs,$request->language);

        //return response()->json($user);
        return response()->json([
	        'access_token' => $authToken,
	        'user' => $user,
	        'professions' => $professions
	    ]);
    }

    public function login(Request $request)
	{
	    $request->validate([
	        'email' => 'email|required',
	        'password' => 'required'
	    ]);

	    $credentials = request(['email', 'password']);
	    if (!auth()->attempt($credentials)) {
	        return response()->json([
	            'message' => 'The given data was invalid.',
	            'errors' => [
	                'password' => [
	                    'Invalid credentials'
	                ],
	            ]
	        ], 422);
	    }

	    $user = User::where('email', $request->email)->first();
	    $authToken = $user->createToken('auth-token')->plainTextToken;

	    return response()->json([
	        'access_token' => $authToken,
	    ]);
	}

	public function pippo(Request $request)
	{
	    $pippo = array('bello','cane');

	    return response()->json([
	        'data' => $pippo,
	    ]);
	}


}
