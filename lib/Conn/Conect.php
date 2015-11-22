<?php
/**
 *
 *  Classe abstrata de conexão com a base de dados
 *  essa classe retorna uma conexão para sua classes filhas
 *
 */

namespace App\Conn;

use \PDO;

abstract class Conect {

    /**
     *
     * Host do Servidor
     *
     * @var string
     *
     */
    private static $host = HOST;

    /**
     *
     * Usuário da Base De Dados
     *
     * @var string
     *
     */
    private static $user = USER_DB;

    /**
     *
     * Nome da Base de Dados
     *
     * @var string
     *
     */
    private static $db_name = DB_NAME;

    /**
     *
     * Senha do Banco de Dados
     *
     * @var string
     *
     */
    private static $pass = PASS_DB;

    /**
     *
     * Tipo de Base de Dados
     *
     * @var string
     *
     */
    private static $type_db = 'mysql';

    /**
     *
     * Objeto de PDO que será retornado
     * para as classes filhas
     *
     * @var null/PDO
     */
    private static $conn = null;

    /**
     *
     * Função de conexão com
     * a base de dados
     *
     * @return PDO
     *
     */
    private function connect()
    {
        if( self::$conn ){
            return self::$conn;
        }

        $option = self::$type_db . ':host=' . self::$host . ';dbname=' . self::$db_name;

        self::$conn = new PDO($option, self::$user, self::$pass);
        self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return self::$conn;
    }

    /**
     *
     * Função usada para obter conexão com a
     * base de dados
     *
     * @return PDO
     *
     */
    protected function getConn()
    {
        return $this->connect();
    }

    /**
     *
     * Função que retornára o resultado
     * da ação das classes de Crud
     *
     */
    abstract public function getResult();

}