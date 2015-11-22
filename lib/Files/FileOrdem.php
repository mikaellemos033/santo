<?php

/**
 * [Ordena multiplos campos do array file]
 *
 * @package [FileOrdem]
 * @author: [Mikael Lemos] <mikaellemos033@gmail.com>
*/


namespace App\Files;


class FileOrdem
{

    /**
     *
     * array vindo do campo File
     *
     * @var array
     *
     */
    public static $files = array();


    /**
     *
     * função que recupera e retorna os
     * dados ordenados
     *
     * @param array $files
     * @return bool|array
     */
    public static function ordem( array $files )
    {
        if( empty($files) || empty($files['tmp_name']) ){
            return false;
        }

        self::$files = $files;
        return self::execOrdem();
    }


    /**
     *
     * Metodo que ordena e retorna o array de dados
     *
     * @return array
     */
    private static function execOrdem()
    {
        $keys = array_keys(self::$files);
        $numbers = count(self::$files['tmp_name']);

        $temp = array();

        for( $i=0; $i < $numbers; $i++ ){
            foreach( $keys as $val ){
                $temp[$i][$val] = self::$files[$val][$i];
            }
        }

        return $temp;
    }

}