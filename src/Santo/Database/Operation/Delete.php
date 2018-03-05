<?php 

namespace Sect\Database\Operation;

class Delete extends ORM
{
	private $query;

	public function run($table)
	{
		$this->query = sprintf('DELETE FROM %s', $this->table);
		return $this;
	}
}