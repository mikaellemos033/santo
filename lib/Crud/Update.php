<?php

namespace App\Crud;

use App\Conn\Conect;

class Update extends Conect
{
    /**
     * tabela onde a alteração
     * será feita
     *
     * @var string
     *
     */
    private $table;

    /**
     *
     * parse_string de bindValues
     *
     * @var string
     *
     */
    private $places;

    /**
     *
     * Termos da alteração
     *
     * @var string
     *
     */
    private $termos;

    /**
     *
     * array indexado que será usado para
     * alteração de dados as keys são correspondentes
     *
     * aos campos da tabela e os valores aos mesmos
     *
     * @var array
     *
     */
    private $dados;

    /**
     *
     * variavel de resultado, ela retornara
     * verdadeiro ou falso para ação
     *
     * @var bool
     */
    private $result;

    /**
     *
     * Variavel que receberá o objeto PDO
     * da classe pai
     *
     * @var  Object
     *
     */
    private $conn;

    /**
     *
     * variavel que servirá como
     * PDOStantments
     *
     * @var Object PDOStantement
     *
     */
    private $update;


    /**
     *
     * Método usado para realizar update
     * de dados
     *
     * @param string $table
     * @param array $dados
     * @param null/string $termos
     * @param null/string $parse
     *
     */
    public function exeUpdate($table, array $dados, $termos = null, $parse = null)
    {
        $this->table = (string) $table;
        $this->termos = (string) $termos;

        $this->dados = $dados;

        if( $parse ) {
            parse_str($parse, $this->places);
        }

        $this->getSintax();
        $this->execute();
    }

    /**
     *
     * Método usado para retornar o
     * resultado da ação
     *
     * @return bool
     *
     */
    public function getResult()
    {
        return $this->result;
    }


    /**
     *
     * Método usado para montar a Query
     * de Update
     *
     */
    private function getSintax()
    {
        $places = array();

        foreach ($this->dados as $key => $val) {
            array_push($places, "{$key} = :{$key}");
        }

        $places = implode(', ', $places);
        $this->update = "UPDATE {$this->table} SET {$places} {$this->termos}";
    }

    /**
     *
     * Método usado para recuperar o objeto
     * PDO da classe Pai, e prepara a query
     *
     * com o PDO Object
     *
     */
    private function conn()
    {
        $this->conn = parent::getConn();
        $this->update = $this->conn->prepare($this->update);
    }

    /**
     *
     * Método que executa atualização e
     * salva o Resultado na variavel result
     *
     */
    private function execute()
    {
        $this->conn();
        try {
            $this->update->execute(array_merge($this->dados, $this->places));
            $this->result = true;
        }
        catch(\PDOException $e){
            $this->result = false;
            die( $e->getMessage() . ' # na linha ' . $e->getLine() );
        }
    }
}