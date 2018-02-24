<?php 

namespace Sect\Config;

use Exception;

class Raw
{
	private $fire;

	public function __construct($path = '')
	{
		$this->fire = $path;
	}

	/**
     * require content php 
     *
	 * @param $file string
	 *
	 * @throw not found file
	 * @return array
	 */
	public function config($file)
	{
		$path = APPPATH . str_replace('.', '/', $file) . '.php';
		
		if (!file_exists($path)) {
			throw new Exception(sprintf('"%s" not found.', $path), 1);
		}

		return require($path);
	}

	/**
	 * Return config on file fire
	 *
	 * @param $file string
	 *
	 * @throw File Not Found
	 * @return array
	 */
	public function fire($file)
	{
		return $this->config(sprintf('%s/%s', $this->fire, $path));
	}
}