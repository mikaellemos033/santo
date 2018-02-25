<?php

namespace Sect\Providers;

use Sect\Patterns\SingleObj;
use Sect\Config\Raw;

class KickProvider
{
	public function handle(array $configs)
	{
		foreach ($configs as $obj) $this->boot(new $obj());
	}

	private function boot(ServiceProvider $provider)
	{
		$provider->boot();
		$provider->register(SingleObj::instance());
	}
}