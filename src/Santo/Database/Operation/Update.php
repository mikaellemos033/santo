<?php 

namespace Sect\Database\Operation;

class Update extends Falcon
{
	private $query;
	private $binds = [];

	public function run(string $table, array $params)
	{
		$this->query = sprintf('update %s set %s', $table, $this->parse($params));
		$this->binds = $params;

		return $this;
	}
}	