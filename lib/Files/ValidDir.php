<?php

/**
 * [Classe responsável por verificar se existe o diretorio de upload]
 *
 * @package [ValidDir]
 * @category [Upload]
 * @author: [Mikael Lemos] <mikaellemos033@gmail.com>
*/


namespace App\Files;


class ValidDir
{

    /**
     *
     * sub diretorios dentro da pasta
     * de upload
     *
     * @var array
     *
     */
    public static $subFolder = array('doc', 'img');

    /**
     *
     * pasta a ser validada
     *
     * @var string
     *
     */
    public static $folder;


    public static function validFolder( $folder, $bool = null )
    {
        if( !is_dir(ROUT . "/webroot/upload/{$folder}") && $bool ){
            self::generateAll();
            return ROUT . "/webroot/upload/{$folder}/";

        }elseif( is_dir(ROUT . "/webroot/upload/{$folder}") ){
            return ROUT . "/webroot/upload/{$folder}/";
        }

        return false;
    }

    public static function createYear()
    {
        $year = date('Y');

        if( !is_dir( ROUT . "/webroot/upload/{$year}") ){
            mkdir(ROUT . "/webroot/upload/{$year}", 0775);
        }
    }

    public static function createMonth()
    {
        $year_month = date('Y/m', strtotime(date('Y-m')));

        if( !is_dir( ROUT . "/webroot/upload/{$year_month}" ) ){
            mkdir(ROUT . "/webroot/upload/{$year_month}", 0775);
        }
    }

    public static function createSubFolder()
    {
        $year_month = date('Y/m', strtotime(date('Y-m')));

        foreach( self::$subFolder as $val ){

            if( !is_dir(ROUT . "/webroot/upload/{$year_month}/{$val}") ){
                mkdir(ROUT . "/webroot/upload/{$year_month}/{$val}", 0775);
            }
        }
    }

    public static function generateAll()
    {
        self::createYear();
        self::createMonth();
        self::createSubFolder();
    }

    public static function setSubFolder( $dados )
    {
        if( is_string($dados) ){
            array_push(self::$subFolder, $dados);

        }elseif( is_array($dados) ){
            array_merge(self::$subFolder, $dados);
        }
    }


}