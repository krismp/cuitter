<?php namespace Cuitter\Forms;

use Laracasts\Validation\FormValidator;

class RegistrationForm extends FormValidator{

	/**
	 * Validation rules for registration form
	 *
	 * @var array
	 */
	protected $rules = [
		'username'	=>	'required|unique:users',
		'email'	=>	'required|email|unique:users',
		'password'	=>	'required|confirmed'
	];

}