<?php 

use Sect\Http\Routing\Route;

class RouteTest extends PHPUnit_Framework_TestCase
{
	public function testGetRoute()
	{
		$route = new Route('/home');
		$route->get('home', function() {
			return 'success route';
		});

		$this->assertEquals('success route', $route->run());
	}

	public function testeError404()
	{
		$route = new Route();
		$route->setErrors([
			'404' => function() {
				return 'page 404';
			}
		]);

		$this->assertEquals('page 404', $route->run());
	}
}