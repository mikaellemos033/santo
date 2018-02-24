<?php

namespace Sect\Database\Operation;

use PDO;

abstract class ORM
{
	protected $pdo;
	protected $query;
	protected $binds = [];

	public function __construct(PDO $pdo)
	{
		$this->pdo = $pdo;
	}

	public function toSql()
	{
		return $this->query;
	}

	public function where(string $clausure, array $binds = [])
	{
		$this->query = sprintf('%s where %s', $this->query, $clausure);
		$this->binds = array_push($this->binds, $binds);

		return $this;
	}

	public function execute()
	{
		$running  = $this->pdo->prepare($this->query);
		$response = $running->execute($this->binds);

		$this->clear();
		return $response;
	}

	protected function parse(array $params)
	{
		$fields = [];
		foreach ($params as $key) $fields[] = sprintf('%s = :%s', $key, $key);

		return implode(' ', $fields);
	}

	protected function clear()
	{
		$this->query = '';
		$this->binds = [];
	}
}