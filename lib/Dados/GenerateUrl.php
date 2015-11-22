<?php

/**
 * [Classe responsável por gerar urls]
 *
 * @package [GenerateUrl]
 * @category [Dados]
 * @author: [Mikael Lemos] <mikaellemos033@gmail.com>
*/


namespace App\Dados;
use App\Crud\Read;

class GenerateUrl
{
    /**
     * string que será convertida
     * em url
     *
     * @var string
     *
     */
    public static $url;

    /**
     *
     * tabela onde será realizada
     * a busca e gerara a url
     *
     * @var string
     *
     */
    public static $table;

    /**
     *
     * Campo da tabela onde será feita
     * a comparação de dados
     *
     * @var string
     *
     */
    public static $place;

    /**
     *
     * Metodo que converte uma string em Url
     *
     * @param string $url
     * @return string
     *
     */
    public static function generateUrl( $url )
    {
        self::$url = (string) $url;
        self::urlFilter();

        return self::$url;
    }

    /**
     *
     * Realiza uma busca no banco de dados
     * e Retorna uma Url única
     *
     * @param $url
     * @param $table
     * @param $place
     *
     * @return string
     *
     */
    public static function createUrl( $url, $table, $place )
    {

        self::$url = (string) $url;
        self::$table = (string) $table;
        self::$place = (string) $place;

        self::search();
        self::urlFilter();

        return self::$url;

    }

    /**
     *
     * Realiza a remoção de espaços
     * e Caracteres especiais
     *
     */
    private static function urlFilter()
    {
        $valid = array('c' => '/[ç]/ui', 'a' => '/[áàãâäÁÀÂÂÄ]/ui', 'e' => '/[éèêëÉÈÊË]/ui', 'i' => '/[íìîïÍÌÎÏ]/ui', 'o' => '/[óòõôöÓÒÕÔÖ]/ui', 'u' => '/[úùûüÚÙÛÜ]/ui', '_' => '/[^a-z0-9]/i', '-' => '/_+/');

        foreach( $valid as $key => $val ){
            self::$url = preg_replace($val, $key, self::$url);
        }

        self::$url = ( substr(self::$url, -1) == '-' ? substr(self::$url, 0, -1) : self::$url );
        self::$url = strtolower(self::$url);
    }

    /**
     *
     * Faz a Busca no banco de dados
     * em busca de resultados similares
     *
     * ao titulo da publicação
     *
     */
    private static function search()
    {
        $read = new Read();
        $read->busca(self::$table, 'WHERE ' . self::$place . ' = :valor', 'valor=' . self::$url);

        if( $read->getBoll() ){
            self::$url .= '-' . ( $read->getRowCount() + 1 );
        }
    }


}