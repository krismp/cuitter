<?php namespace Cuitter\Forms;

use Laracasts\Validation\FormValidator;

class PublishStatusForm extends FormValidator
{
	/**
	 * Validation rules for update status form
	 *
	 * @var array
	 */
	protected $rules = [
		'body'	=>	'required',
	];
}