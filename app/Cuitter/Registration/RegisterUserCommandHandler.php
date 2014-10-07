<?php namespace Cuitter\Registration;

use Laracasts\Commander\CommandHandler;
use Cuitter\Users\User;
use Cuitter\Users\UserRepository;
use Laracasts\Commander\Events\DispatchableTrait;

class RegisterUserCommandHandler implements CommandHandler{

	use DispatchableTrait;

	protected $repository;

	public function __construct(UserRepository $repository)
	{
		$this->repository = $repository;
	}

	/**
	 * Handle the command
	 * 
	 * @param  $command
	 * @return $mixed
	 */
	public function handle($command)
	{
		$user = User::register(
			$command->username, $command->email, $command->password
		);

		$this->repository->save($user);

		$this->dispatchEventsFor($user);

		return $user;
	}

}