<?php

namespace Sect\Providers\Base;

use Sect\Config\Raw;
use Sect\Providers\ServiceProvider;
use Sect\Patterns\SingleObj;

class ConfigProviders implements ServiceProvider
{
	public function boot()
	{
		//
	}

	public function register(SingleObj $singleton)
	{
		$singleton->register('sect.config', function(){
			return new Raw(SECT_BASE . '/Fire');
		});
	}
}