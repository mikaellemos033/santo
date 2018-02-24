<?php

namespace Sect\Dispatch;

use Sect\Config\Raw;
use ReflectionClass;
use Exception;

class EventDispatch
{
	/**
	 * @param $event string
	 * @param $params any
	 * @throw Event not register
	 *
	 * @return null
	 */
	public function dispatch($event, $params = null)
	{
		$events = Raw::fire('Events');

		if (!array_key_exists($event, $events)) {
			throw new Exception(sprintf('Event "%s" not register.', $event), 1);
		}

		$this->execute($events[$event], $params);
	}

	private function execute($events, $params = null)
	{
		if (!is_array($events)) {
			return $this->instances($events, $params);
		}

		foreach ($events as $event) {
			$this->instances($event, $params);
		}
	}

	private function instances($event, $params)
	{
		$reflection = new ReflectionClass($event);
		$subject    = $reflection->newInstanceArgs($params);

		$subject->dispatch();
	}
}