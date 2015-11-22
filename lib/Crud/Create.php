<?php

namespace App\Crud;

use App\Conn\Conect;

class Create extends Conect {

    /**
     *
     * array indexado que conterá os dados
     * para insert
     *
     * as keys equivalem aos campos da tabela e
     * os valores aos respectivos valores
     *
     * @var array
     *
     */
    private $dados;

    /**
     * Variavel que conterá o
     * resultado da ação
     *
     * se o resultado for true
     * retornará o id do insert
     *
     * se o for false, retornará
     * false
     *
     * @var boolean/int
     *
     */
    private $result;

    /**
     * nome da tabela onde os dados
     * serão inseridos
     *
     * @var string
     *
     */
    private $table;

    /**
     * variavel usada para montar a query
     *
     * @var string
     */
    private $query;

    /**
     * variavel que contém a conexão com
     * a base de dados
     *
     * @var Object PDO
     *
     */
    private $conn;

    /**
     *
     * Função que recuperá-la os dados
     * para cadastro
     *
     * @param $table
     * @param array $dados
     *
     */
    public function exeCreate($table, array $dados)
    {
        $this->table = (string) $table;
        $this->dados = $dados;

        $this->sintax();
        $this->execute();
    }

    /**
     *
     * Função que retornará o
     * resultado da ação
     *
     * @return bool boolean/int
     *
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     *
     * Função responsável por
     * Montar a query
     *
     */
    private function sintax()
    {
        $campos = implode( ',', array_keys($this->dados) );
        $values = ':' . implode(', :', array_keys($this->dados));

        $this->query = "INSERT INTO {$this->table} ({$campos}) VALUES ({$values})";
    }

    /**
     *
     * Função responsável por
     * executar o cadastro
     *
     */
    private function execute()
    {
        $this->conn = parent::getConn();

        try{
            $this->query = $this->conn->prepare($this->query);
            $this->query->execute($this->dados);

            $this->result = $this->conn->lastInsertId();

        }catch (\PDOException $e){
            $this->result = false;
            die( $e->getMessage() . ' # na linha ' . $e->getLine() );
        }
    }

}