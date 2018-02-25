<?php 

use Sect\Http\Routing\Route;

class RouteTest extends PHPUnit_Framework_TestCase
{
	public function testGetRoute()
	{
		$route = new Route('/home');
		$route->get('home', function() {
			return 'sucesso route';
		});

		$this->assertEquals('sucesso route', $route->run());
	}
}