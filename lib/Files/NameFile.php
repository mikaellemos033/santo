<?php

/**
 *
 * @package [NameFile]
 * @author: [Mikael Lemos] <mikaellemos033@gmail.com>
*/


namespace App\Files;


class NameFile
{

    public static $files = array();
    public static $path = ROUT;

    public static function rename( array $files, $path )
    {
        self::$files = $files;
        self::$path .= '/webroot/upload/' . date('Y/m', strtotime(date('Y-m'))) . "/{$path}/";

        self::action();

        return self::$files;
    }

    private static function action()
    {
        foreach( self::$files as $key => $val ){

            while( file_exists(self::$path . $val['name']) ){
                $val['name'] = time() . $val['name'];
            }

            self::$files[$key]['name'] = $val['name'];
        }
    }

}