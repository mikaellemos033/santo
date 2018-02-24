<?php 

namespace Sect\Authenticate;

use Exeception;
use Sect\Config\Raw;

class Auth 
{
	private static $config;

	public function __construct()
	{
		if (empty(self::$config)) $this->loadConfigs();
	}

	public static function check($session)
	{
		return !empty(session($session)->get());
	}

	public static function content($session)
	{
		if (static::check($session)) return session($session)->get();
		return null;		
	}

	public function loadConfigs()
	{
		self::$config = Raw::fire('Auth');
	}

	public function authenticate($route, array $params)
	{		
		$auth = $this->makeAuth($route);		
		$user = $auth->handle($params);

		if ($user->success()) session()->set($auth->getSession(), $user->getContent());			
		return $user;
	}

	private function makeAuth($route)
	{
		if (empty(self::$config[$route])) throw new Exeception(sprintf('The auth "%s" not exists.', $route), 1);
		return new self::$config[$route];
	}
}