<?php 

namespace Sect\FormatResponse;

interface Format 
{	
	public function getContent();

	public function getMessage();

	public function success();

	public function getResponse();
}