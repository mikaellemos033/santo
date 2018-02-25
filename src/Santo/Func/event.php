<?php 

use Sect\Dispatch\EventDispatch;

function event($event) {

	$params = func_get_args();
	unset($params[0]);

	$trigger = new EventDispatch();
	$trigger->dispatch($event, $params);

}