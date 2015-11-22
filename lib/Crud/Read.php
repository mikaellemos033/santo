<?php

namespace App\Crud;

use App\Conn\Conect;

class Read extends Conect
{
    /**
     *
     * Tabela de onde será realizada
     * a busca
     *
     * @var string
     *
     */
    private $table;

    /**
     *
     * Bind Values da Seleção
     *
     * @var string
     *
     */
    private $places;

    /**
     * Variavel que conterá o
     * resultado da ação
     *
     * se o resultado for true
     * retornará o um array de dados
     *
     * se o for false, retornará
     * false
     *
     * @var boolean/array
     *
     */
    private $result;

    /**
     *
     * variavel principal da classe
     * onde ela receberá a conexão e
     *
     * realizara a consulta na base dados
     *
     * @var Object
     *
     */
    private $read;

    /**
     *
     * Variavel que receberá o
     * Objeto PDO
     *
     * @var Object
     *
     */
    private $conn;

    /**
     *
     * função principal de entrada onde
     * são informado dados e a busca é
     *
     * realizada
     *
     * @param string $table
     * @param null/string $termos
     * @param null/string $attr
     *
     */
    public function busca($table, $termos = null, $attr = null)
    {
        if( !empty($attr) ) {
            parse_str($attr, $this->places);
        }

        $this->table = "SELECT * FROM {$table} {$termos}";
        $this->ExeRead();
    }

    /**
     *
     * retorna o Resultado da Busca
     *
     * @return bool/array
     *
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * Retorna um Booleano e
     * verifica se o resultado
     *
     * está vazio
     *
     * @return bool
     */
    public function getBoll()
    {
        if( !empty($this->result) && is_array($this->result) ){
            return true;

        }else{
            return false;
        }
    }

    /**
     *
     * muda a parse string da seleção de dados
     *
     * @param string $attr
     *
     */
    public function setAtributos($attr)
    {
        parse_str($attr, $this->places);
        $this->ExeRead();
    }

    /**
     *
     * Realiza um busca livre com inner joins
     *
     * @param $Query
     * @param null/string $attr
     *
     */
    public function tableFree($Query, $attr = null)
    {
        if( !empty($attr) ){
            parse_str($attr, $this->places);
        }

        $this->table = "SELECT * FROM {$Query}";
        $this->ExeRead();
    }

    /**
     *
     * Retorna o numero de linhas
     * obtidas numa consulta
     *
     * @return int
     *
     */
    public function getRowCount()
    {
        return $this->read->RowCount();
    }

    /**
     *
     * monta a query de seleção de dados
     *
     * @return bool
     *
     */
    private function getSintax()
    {
        if( empty($this->places) ){
            return false;
        }

        foreach ($this->places as $campos => $value) {

            if ($campos == 'limit' || $campos == 'offset'){
                $value = (int)$value;
            }

            $this->read->bindValue(":{$campos}", $value, (is_int($value) ? \PDO::PARAM_INT : \PDO::PARAM_STR));
        }
    }

    /**
     *
     * obtém a conexão de dados da classe
     * pai e salva na variável conn
     *
     * e prepara a query e a salvá na variável
     * read
     *
     */
    private function conn()
    {
        $this->conn = parent::getConn();
        $this->read = $this->conn->prepare($this->table);
    }

    /**
     *
     * realiza a consulta e salva os dados
     * na variavel de resultado
     *
     */
    private function ExeRead()
    {
        $this->conn();

        try{
            $this->getSintax();
            $this->read->execute();

            $this->result = $this->read->fetchAll(\PDO::FETCH_ASSOC);
        } catch(\PDOException $e){
            $this->result = false;
            die( $e->getMessage() . ' # na linha ' . $e->getLine() );
        }

    }

}