<?php

use Cuitter\Forms\SignInForm;

class SessionsController extends \BaseController {

	public function __construct(SignInForm $signInForm)
	{
		$this->beforeFilter('guest', ['except' => 'destroy']);
		$this->signInForm = $signInForm;
	}

	/**
	 * Show the form for signing in.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('sessions.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$formData = Input::only('email', 'password');
		
		$this->signInForm->validate($formData);		

		if ( ! Auth::attempt($formData))
		{
			Flash::error('Ups kayanya ada yang salah deh, coba cek email atau password kamu lagi');

			return Redirect::back()->withInput();
		}

		Flash::message('Selamat Datang Kembali');

		return Redirect::intended('statuses');
	}

	/**
	 * Log a user out from cuitter
	 * 
	 * @return mixed
	 */
	public function destroy()
	{
		Auth::logout();

		Flash::message('Kamu berhasil logout');

		return Redirect::home();
	}

}
