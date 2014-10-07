<?php namespace Cuitter\Statuses\Events;

class StatusWasPublished
{
	public $body;

	public function __construct($body)
	{
		$this->body = $body;
	}
}