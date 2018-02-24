<?php

namespace Sect\Providers;

use Sect\Patterns\SingleObj;
use Sect\Config\Raw;

class KickProvider
{
	private $configs = [];

	public function __construct()
	{
		$this->configs = Raw::fire('providers');
	}

	public function handle()
	{
		if (is_array($this->configs)) {
			foreach ($this->configs as $obj) $this->boot(new $obj());
		}
	}

	private function boot(ServiceProvider $provider)
	{
		$provider->boot();
		$provider->register(SingleObj::instance());
	}
}