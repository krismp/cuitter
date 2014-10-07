<?php namespace Cuitter\Statuses;

use Cuitter\Users\User;

Class StatusRepository {

	public function getAllForUser(User $user)
	{
		return $user->statuses()->with('user')->latest()->get();
	}

	/**
	 * Save a new status for a user
	 * 
	 * @param Status $status
	 * @param $userId
	 * @return mixed
	 */
	public function save(Status $status, $userId)
	{
		return User::findOrFail($userId)
			->statuses()
			->save($status);
	}

}