<?php 

namespace Sect;

class Session
{
	public static $instance = null;

	public static function instance()
	{
		if (!self::$instance) self::$instance = new Session();
		return self::$instance;		
	}

	public function get($name)
	{
		if (isset($_SESSION[$name])) return $_SESSION[$name];
		return null;
	}

	public function set($name, $value = null)
	{
		$_SESSION[$name] = $value;
		return $this;
	}

	public function clear()
	{
		session_destroy();
		session_start();
	}
}