<?php namespace Cuitter\Statuses;

use Laracasts\Commander\Events\EventGenerator;
use Cuitter\Statuses\Events\StatusWasPublished;
use Eloquent;
use Laracasts\Presenter\PresentableTrait;

class Status extends Eloquent
{
	use EventGenerator, PresentableTrait;

	/**
	 * Fillable field for a new status
	 *
	 * @var array
	 */
	protected $fillable = ['body'];

	/**
	 * Path to the presenter for a status
	 *
	 * @var array
	 */
	protected $presenter = 'Cuitter\Statuses\StatusPresenter';

	/**
	 * A status belongs to a user
	 */
	public function user()
	{
		return $this->belongsTo('Cuitter\Users\User');
	}

	/**
	 * Publish a new status
	 *
	 * @param $body
	 * @return static
	 */
	public static function publish($body)
	{	
		$status = new static(compact('body'));

		$status->raise(new StatusWasPublished($body));

		return $status;
	}
}