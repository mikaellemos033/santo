<?php

namespace App\Crud;

use App\Conn\Conect;

/**
 * Class Delete
 * @package App\Crud
 *
 * Responsável por deletar dados
 * do banco de dados
 *
 */

class Delete extends Conect
{

    /**
     *
     * Parse string usada para recuperar
     * campos e valores para a realização
     *
     * da ação
     *
     * @var parse_string
     *
     */
    private $places;

    /**
     *
     * Termos da execução de delete
     * de arquivos
     *
     * @var string
     *
     */
    private $termos;

    /**
     *
     * Nome da tabela
     *
     * @var string
     *
     */
    private $table;

    /**
     *
     * variavel que recebera o
     * objeto PDO
     *
     * @var object PDO
     *
     */
    private $conn;

    /**
     *
     * variavel que recebera o objeto
     * PDO com o prepare
     *
     * @var  PDOStantments
     *
     */
    private $delete;

    /**
     *
     * variavel de resultado
     * que recebera um boolean
     *
     * de acordo com o sucesso
     * ou fracasso da ação
     *
     * @var bool
     *
     */
    private $result;

    /**
     *
     * Mensagem de retornada de acordo
     * com a operação
     *
     * @var string
     *
     */
    private $error;

    /**
     * ************************************************************
     * ********************** PUBLIC METHODS **********************
     * ************************************************************
     */


    /**
     *
     * Metodo usado para realizar a
     * remoção dos dados do banco
     *
     * @param $table
     * @param null $termos
     * @param null $parse
     *
     */
     public function exeDelete($table, $termos = null, $parse  = null)
     {
         $this->table = (string) $table;
         $this->termos = (string) $termos;

         if($parse): parse_str($parse, $this->places); endif;

         $this->getSintax();
         $this->execute();
     }

    /**
     *
     * Retorna um boolean com o sucesso
     * ou falha da ação
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
     * Retorna uma mensagem vinda
     * da classe
     *
     * @return string
     *
     */
    public function getError()
    {
        return $this->error;
    }


    /**
     * ************************************************************
     * ********************* PRIVATE METHODS **********************
     * ************************************************************
     */


    /**
     *
     * Metodo Responsável por montar a
     * Query
     *
     */
    private function getSintax()
    {
        $this->delete = "DELETE FROM {$this->table} {$this->termos}";
    }


    /**
     *
     * Recupera o Objeto PDO da classe pai
     */
    private function conn()
    {
        $this->conn = parent::getConn();
        $this->delete = $this->conn->prepare($this->delete);
    }


    /**
     *
     * executa a query e seta valores
     * para as variveis de result e error
     *
     */
    private function execute()
    {
        $this->conn();

        try{
            $this->delete->execute($this->places);
            $this->result = true;
            $this->error = 'Operação realizada com sucesso';

        } catch(\PDOException $e){
            $this->result = false;
            die($e->getMessage() . ' # na linha: ' .  $e->getLine());
        }
    }

}