<?php namespace Cuitter\Forms;

use Laracasts\Validation\FormValidator;

class SignInForm extends FormValidator{

	/**
	 * Validation rules for registration form
	 *
	 * @var array
	 */
	protected $rules = [
		'email'	=>	'required',
		'password'	=>	'required'
	];

}