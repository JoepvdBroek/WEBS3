<?php

class HomeController extends BaseController {

	public function error($message)
	{
		return View::make('home.error')
			->with('title', 'Error Page')
			->with('message', $message);
	}

	public function getLogin()
	{
		return View::make('home.login')
			->with('title', 'Login');
	}

	public function getRegister()
	{
		return View::make('home.register')
			->with('title', 'Register');
	}

	public function postLogin()
	{
		$input = Input::all();

		$rules = array('username'=>'required', 'password'=>'required');

		$val = Validator::make($input, $rules);

		if($val->fails())
		{
			return Redirect::to('login')->withErrors($val);
		}
		else
		{
			$credentials = array('username'=>$input['username'], 'password'=>$input['password']);

			if(Auth::attempt($credentials))
			{
				return Redirect::to('admin');
			}
			else
			{
				return Redirect::to('login');
			}
		}
	}

	public function logout()
	{
		Auth::logout();
		return Redirect::to('/');
	}

	public function postRegister()
	{
		$input = Input::all();

		$rules = array('username'=>'required|unique:users|min:6', 'password'=>'required|min:6');

		$val = Validator::make($input, $rules);

		if($val->passes())
		{
			$password = $input['password'];
			$password = Hash::make($password);

			$user = new User();
			$user->username = $input['username'];
			$user->password = $password;
			$user->save();

			return Redirect::to('login');
		}else
		{
			return Redirect::to('register')->withInput()->withErrors($val);
		}
	}

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
}
