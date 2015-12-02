<?php

namespace App\Http\Controllers;

use App\User;
use Input;
use Hash;

class RegisterController extends Controller {

	public function showRegister()
	{
		return view('register');
	}

	public function doRegister()
	{
		$user = new User;
		$user -> email = Input::get('email');
		$user -> username = Input::get('username');
		$user -> password = Hash::make(Input::get('password'));
		$user -> save();
		$theEmail = Input::get('email');
		return view('thanks') -> with('theEmail', $theEmail);
	}

}