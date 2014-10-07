<?php namespace Cuitter\Users;

Class UserRepository {

	/**
	 * Persist a user
	 * 
	 * @param User $user
	 * @return mixed
	 */
	public function save(User $user)
	{
		return $user->save();
	}

	/**
	 * Get paginated list of all users
	 *
	 * @param int $howMany
	 * @return mixed
	 */
	public function getPaginated($howMany = 25)
	{
		return User::orderBy('username', 'asc')->simplePaginate($howMany);
	}

	/**
	 * Get user profile by username
	 *
	 * @param $username
	 * @return mixed
	 */
	public function findByUsername($username)
	{
		return User::with(['statuses' => function($query)
		{
			$query->latest();
		}])->whereUsername($username)->first();
	}

}