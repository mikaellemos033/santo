<?php 

namespace Sect\Http\Routing;

use Exception;
use Sect\Config\Raw;

class Route
{
	private $parse;

	private $errors = [];
	private $post   = [];
	private $get    = [];
	private $put    = [];
	private $delete = [];

	public function __construct()
	{
		$this->errors = single('config')->fire('errors');
		$this->parse  = new RoutePath(filter_input(INPUT_SERVER, 'REQUEST_URI'));
	}

	public function get($url, $call)
	{
		$this->get[] = [
			'url'  => $url,
			'call' => $call,
		];
	}

	public function post($url, $call)
	{
		$this->post[] = [
			'url'  => $url,
			'call' => $call,
		];
	}

	public function put($url, $call)
	{
		$this->put[] = [
			'url'  => $url,
			'call' => $call,
		];
	}

	public function delete($url, $call)
	{
		$this->delete[] = [
			'url'  => $url,
			'call' => $call,
		];
	}

	public function run()
	{
		$request = filter_input(INPUT_SERVER, 'REQUEST_METHOD', FILTER_DEFAULT);
		$method  = filter_input(INPUT_POST, '_method', FILTER_DEFAULT);
		
		if ($request == 'get') return $this->records($this->get);
		if ($method == 'put') return $this->records($this->put);
		if ($method == 'destroy') return $this->records($this->delete);		

		return $this->records($this->post);
	}

	private function records(array $params)
	{
		$finded = false;
		
		foreach ($params as $route) {
			$finded = $this->parse($route['url'], $route['call']);
			if ($finded) break;
		}

		if (isset($this->errors['404'])) return $this->boot($this->errors['404']['url'], $this->errors['404']['call']);
		throw new Exception('Request not found', 1);
	}
}