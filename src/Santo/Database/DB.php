<?php

namespace Sect\Database;

use PDO;
use Sect\Database\Operation\Insert;
use Sect\Database\Operation\Select;
use Sect\Database\Operation\Update;
use Sect\Database\Operation\Delete;

class DB
{
	private static $instance = null;

	private $pdo;

	public function __construct(array $config)
	{
		$this->connect($config);
	}

	private function connect(array $config)
	{				
		$this->pdo = new PDO(sprintf('%s:host=%s;dbname=%s;charset=UTF8', $config['drive'], $config['host'], $config['dbname']), $config['user'], $config['pass']);
		$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}

	public function select()
	{
		return new Select($this->pdo);
	}

	public function delete()
	{
		return new Delete($this->pdo);
	}

	public function update()
	{
		return new Update($this->pdo);
	}

	public function insert()
	{
		return new Insert($this->pdo);
	}
}