<?php namespace Cuitter\Users;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Cuitter\Registration\Events\UserRegistered;
use Laracasts\Commander\Events\EventGenerator;
use Eloquent, Hash;
use Laracasts\Presenter\PresentableTrait;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, EventGenerator, PresentableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * Path to the presenter for a user
	 * 
	 * @var string
	 */
	protected $presenter = 'Cuitter\Users\UserPresenter';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	/**
	 * Password must always be hashed
	 * 
	 * @param $password
	 */
	public function setPasswordAttribute($password)
	{
		$this->attributes['password'] = Hash::make($password);
	}

	/**
	 * A User has many statuses.
	 * 
	 * @return mixed
	 */
	public function statuses()
	{
		return $this->hasMany('Cuitter\Statuses\Status');
	}

	/**
	 * Which fields may be mass assigned?
	 *
	 * @var array
	 */
	protected $fillable = ['username', 'email', 'password'];

	public function getRememberToken()
	{
	    return $this->remember_token;
	}

	public function setRememberToken($value)
	{
	    $this->remember_token = $value;
	}

	public function getRememberTokenName()
	{
	    return 'remember_token';
	}

	/**
	 * Register a new user
	 * 
	 * @param  $username
	 * @param  $email
	 * @param  $password
	 * @return static
	 */
	public static function register($username, $email, $password)
	{
		$user = new static(compact('username', 'email', 'password'));

		$user->raise(new UserRegistered($user));

		return $user;
	}

	/**
	 * Determine if the current user is the same
	 * as the current one.
	 * 
	 * @param $user
	 * @return bool
	 */
	public function is($user)
	{
		if (is_null($user)) return false;
		
		return $this->username == $user->username;
	}

}
