<?php

namespace App\Files;


class FilterErros
{

    public static function filter_erros( array $files, array $types, $Mb )
    {
        $files = self::valid_size($files, $Mb);
        return self::filtro($files, $types);
    }


    private static function filtro( $files, $types )
    {
        foreach ( $files as $key => $val ) {
            if( $val['error'] === 0 && in_array($val['type'], $types) ){
                continue;
            }

            unset( $files[$key] );
        }

        return $files;
    }


    private static function valid_size($files, $mega)
    {
        $mega = $mega * ( 1024 * 1024 );

        foreach( $files as $key => $val ){
            if( $val['size'] <= $mega ){
                continue;
            }

            unset($files[$key]);
        }

        return $files;
    }


}