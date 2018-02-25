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

	public function __construct($url = '')
	{
		$url          = $url ? $url : filter_input(INPUT_SERVER, 'REQUEST_URI');
		$this->parse  = new RoutePath($url);
	}

	public function setErrors(array $errors)
	{
		$this->errors = $errors;
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

		$request = !$request ? 'get' : strtolower($request);

		if ($request == 'get') return $this->records($this->get);
		if ($method == 'put') return $this->records($this->put);
		if ($method == 'destroy') return $this->records($this->delete);

		return $this->records($this->post);
	}

	private function records(array $params)
	{
		$finded = false;

		foreach ($params as $route) {
			$finded = $this->parse->call($route['url'], $route['call']);
			if ($finded) return $finded;
		}

		if (isset($this->errors['404'])) return (new Boot())->run($this->errors['404']);
		throw new Exception('Request not found', 1);
	}
}