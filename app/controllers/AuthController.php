<?php

class AuthController extends BaseController{

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
}