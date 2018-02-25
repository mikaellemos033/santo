<?php 

namespace Sect\Http\Routing;

class RoutePath
{
	private $matches = [];
	private $url;
	private $boot;

	public function __construct($url)
	{
		$this->url  = trim($url, '/');
		$this->boot = new Boot();
	}

	/**
	 * @param $url string
	 * @param $call string|call
	 *
	 * @return boolean|call
	 */
	public function call($url, $call)
	{		
		if (!$this->match($url)) return false;		
		return $this->boot->run($call, $this->matches);
	}

	/**
  	 *
	 * @param $url string
	 *
	 * @return boolean
	 */
	private function match($url)
	{		
		$regex = sprintf('#^%s#', preg_replace('#:([\w])#', '([^/]+)', trim($url, '/')));		
		if (!preg_match($regex, $this->url, $matches)) return false;

		array_shift($matches);
		$this->matches = $matches;

		return true;
	}
}