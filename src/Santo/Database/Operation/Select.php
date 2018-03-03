<?php 

namespace Sect\Database\Operation;

use PDO;

class Select extends ORM
{
	public function run(string $table, array $fields = [])
	{
		$fields = empty($fields) ? ['*'] : $fields;
		$this->query = sprintf('SELECT %s FROM %s', implode(',', $fields), $table);

		return $this;
	}

	public function execute()
	{
		$query = parent::execute();		
		return $query->fetchAll(PDO::FETCH_CLASS);
	}
}