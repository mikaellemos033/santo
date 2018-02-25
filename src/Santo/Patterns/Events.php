<?php

namespace Sect\Patterns;

abstract class Events
{
	protected $observers = [];

	public function appendObserver(Observer $observer)
	{
		array_push($this->observers, $observers);
		return $this;
	}

	public function dispatch()
	{
		foreach ($this->observers as $observer) {
			(new $observer())->handle($this);
		}
	}
}