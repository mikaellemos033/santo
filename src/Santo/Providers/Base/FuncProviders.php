<?php

namespace Sect\Providers\Base;

use Sect\Config\Raw;
use Sect\Providers\ServiceProvider;
use Sect\Patterns\SingleObj;

class FuncProviders implements ServiceProvider
{
	public function boot()
	{
		$config = new Raw(BASE . '/Fire');
		$func   = BASE . '/Func';
		$lists  = $config->fire('Func');

		foreach ($lists as $list) require (sprintf('%s/%s.php', $func, $list));
	}

	public function register(SingleObj $singleton)
	{
		//		
	}
}