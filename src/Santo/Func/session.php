<?php

use Sect\Session;

function session() 
{
	return new Session::instance();
}