<?php

use Cuitter\Forms\RegistrationForm;
use Cuitter\Registration\RegisterUserCommand;

class RegistrationController extends BaseController {

	/**
	 * @var RegistrationForm
	 */
	private $registrationForm;

	/**
	 * Constructor
	 * 
	 * @param RegistrationForm $registrationForm 
	 */
	public function __construct(RegistrationForm $registrationForm)
	{
		$this->registrationForm = $registrationForm;
		$this->beforeFilter('guest');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('registration.create');
	}

	/**
	 * Create a new cuiiter account
	 *
	 * @return String
	 */
	public function store()
	{
		$this->registrationForm->validate(Input::all());

		$user = $this->execute(RegisterUserCommand::class);

		Auth::login($user);

		Flash::overlay('Hai, Selamat Datang! seneng banget kamu bisa gabung disini :)');

		return Redirect::home();
	}

}
