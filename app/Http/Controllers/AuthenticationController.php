<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\SignupRequest;
use App\Repositories\UserRepository;

class AuthenticationController extends Controller
{
  protected $model;

  public function __construct(User $user){
  	$this->model = new UserRepository($user);
  }

	public function register(SignupRequest $request){
	// $user = User::create([
	// 	'name' => $request->name,
	// 	'email' => $request->email,
	// 	'address' => $request->address,
	// 	'phone' => $request->phone,
	// 	'password' => Hash::make($request->password),
	// ]);

	$user = $this->model->create($request->only(['name', 'email', 'address', 'phone', 'password']));
	$this->model->setModel($user);

	if(!empty($request->grade) ){
		$this->model->createStudent($request->only(['grade']));
	  // app('App\Http\Controllers\StudentsController')->create($request->only('grade'), $user);
	} else{
		$this->model->createTeacher($request->only(['experience']));
	  // app('App\Http\Controllers\TeachersController')->create($request->only('experience'), $user);
	}

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

				'message' => 'Invalid email or password:('

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
