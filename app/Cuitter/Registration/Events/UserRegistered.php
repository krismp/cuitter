<?php namespace Cuitter\Registration\Events;

use Cuitter\Users\User;

class UserRegistered {

	public $user;

	public function __construct(User $user)
	{
		$this->user = $user;
	}
}