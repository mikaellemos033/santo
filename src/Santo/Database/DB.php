<?php

namespace Sect\Database;

use PDO;
use Operation\Insert;
use Operation\Select;
use Operation\Update;
use Operation\Delete;

class DB
{
	private static $instance = null;

	private $pdo;

	public function __construct(string $fire)
	{
		$this->connect($fire);
	}

	private function connect()
	{			
		$config = single('config')->raw($fire);

		$this->pdo = new PDO(sprintf('%s=:host=%s;dbname=%s', $config['drive'], $config['host'], $config['dbname']), $config['user'], $config['pass']);
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