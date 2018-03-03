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
		$file .= '.php';
		
		if (!file_exists($file)) {
			throw new Exception(sprintf('"%s" not found.', $file), 1);
		}

		return require($file);
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
		return $this->config(sprintf('%s/%s', $this->fire, $file));
	}
}