<?php 

namespace Sect\Patterns;

use Exception;

class SingleObj
{
	private $classes = [];
	public static $instance = null;

	public function register($name, $reference)
	{
		if (array_key_exists($name, $this->classes)) {
			throw new Exception(sprintf('%s is used', $name), 1);
		}

		$this->classes[$name] = call_user_func($reference);
		return $this;
	}

	public function get($name)
	{
		if (!array_key_exists($name, $this->classes)) {
			throw new Exception(sprintf('%s not found', $name), 1);
		}

		return $this->classes[$name];
	}

	public static function instance()
	{
		if (is_null(self::$instance)) self::$instance = new self();
		return self::$instance;
	}
}