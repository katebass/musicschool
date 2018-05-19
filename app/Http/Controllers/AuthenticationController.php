<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\SignupRequest;

class AuthenticationController extends Controller
{
    public function register(SignupRequest $request){
    	$user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

    	if( Auth::attempt($request->only(['email', 'password'])) ) {
    		return redirect()->route('home');
    	} else {
    		abort(403);
    	}
    }

    public function login(Request $request){

    	if (! Auth::attempt( ['email' => $request->email, 'password' => $request->password] ) )
   		{
   			return back()->withErrors([

   				'message' => 'Invalig email or password:('

   			]);
   		}

   		return redirect()->home();
    }

    public function destroy()
    {
    	Auth::logout();

    	return redirect()->home();
    }
}
