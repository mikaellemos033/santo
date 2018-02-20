<?php 

namespace Sect\Database\Operation;

class Select extends Falcon
{
	public function run(string $table, array $fields = [])
	{
		$fields = empty($fields) ? ['*'] : $fields;
		return $this->query = sprintf('SELECT %s FROM %s', implode(',', $fields), $table);
	}

	public function execute()
	{
		$query = parent::execute();
		return $query->fetchAll(\PDO::FETCH_OBJECT);
	}
}