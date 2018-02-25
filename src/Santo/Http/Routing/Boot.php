<?php

namespace Sect\Http\Routing;

class Boot
{
	/**
	 * Load class and execute your method
	 *
	 * @param $call string
	 * @param $params array
	 *
	 * @return call
	 */
	public function run($call, array $params = [])
	{
		if (is_callable($call)) return call_user_func_array($call, $params);

		$binds = explode('@', $call);
		return call_user_func_array([new $binds[0], $binds[1]], $params);
	}
}