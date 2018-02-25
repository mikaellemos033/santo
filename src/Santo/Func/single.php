<?php 

use Sect\Patterns\SingleObj;

function single($name) 
{
	return SingleObj::instance()->get($name);
}