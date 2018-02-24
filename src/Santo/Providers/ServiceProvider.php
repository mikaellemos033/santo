<?php

namespace Sect\Providers;

use Sect\Patterns\SingleObj;

interface ServiceProvider
{
	public function register(SingleObj $singleton);

	public function boot();
}