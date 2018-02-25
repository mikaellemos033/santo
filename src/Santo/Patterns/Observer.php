<?php

namespace Sect\Patterns;

interface Observer
{
	/**
	 * core function
	 *
	 * @return void
	 */
	abstract function handle(Events $event);
}