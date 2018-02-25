<?php 

namespace Sect\Authenticate;

use Sect\FormatResponse\Auth;

abstract class AuthBase
{
	/**
	 * make validation
	 */
	abstract public function handle(array $params);

	/**
	 * return session name
	 * @return string
	 */
	abstract public function getSession();

	public function success($message, $data = null)
	{
		return $this->response(true, $message, $data);
	}

	public function error($message, $data = null)
	{
		return $this->response(false, $message, $data);
	}

	protected function response($success, $message, $data = null)
	{
		return new Auth($success, $message, $this->getSession(), $data);		
	}
}