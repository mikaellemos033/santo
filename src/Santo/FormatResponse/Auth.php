<?php 

namespace Sect\FormatResponse;

use stdClass;

class Auth implements Format
{
	private $response;

	public function __construct($success, $message, $session, $object = null)
	{
		$this->response = new stdClass;
		
		$this->response->success = $success;
		$this->response->message = $message;
		$this->response->session = $session;
		$this->response->object  = $object;
	}

	public function getContent()
	{
		return $this->response->object;
	}

	public function getMessage()
	{
		return $this->response->message;
	}

	public function success()
	{
		return $this->response->success;
	}

	public function getResponse()
	{
		return $this->response;
	}
}