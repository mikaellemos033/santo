<?php 

namespace Sect\Database\Operation;

class Insert extends ORM
{
	public function run(string $table, array $params)
	{
		$fields      = $this->fields($params);
		$this->query = sprintf('INSERT INTO %s (%s) VALUES (%s)', $table, str_replace(':', '', implode(',', $fields)), implode(',', $fields));
		$this->binds = $params;
	}

	public function execute()
	{
		$running = parent::execute();
		return $running->lastInsertId();
	}

	private function fields(array $params)
	{
		$fields = [];		
		$keys   = is_array($params[0]) ? $params[0] : $params;

		foreach ($keys as $key) $fields[] = ':' . $key;
		return $fields;
	}
}