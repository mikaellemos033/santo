<?php

namespace Sect\Providers;

use Sect\Patterns\SingleObj;
use Sect\Config\Raw;

class KickProvider
{	
	public function handle()
	{
		$config = new Raw(BASE . '/Fire');	
		foreach ($config->fire('Providers') as $obj) $this->boot(new $obj());		
	}

	private function boot(ServiceProvider $provider)
	{
		$provider->boot();
		$provider->register(SingleObj::instance());
	}
}