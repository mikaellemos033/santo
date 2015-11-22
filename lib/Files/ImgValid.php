<?php

/**
 * [descrição]
 *
 * @package [ImgValid]
 * @category [Valida Images]
 * @author: [Mikael Lemos] <mikaellemos033@gmail.com>
*/


namespace App\Files;

use App\Interfaces\FileValidate;

class ImgValid implements FileValidate
{
    private static $types = array(
        'image/png',
        'image/jpg',
        'image/pjpeg',
        'image/jpeg'
    );

    private $mega = 3;
    private $files;


    public function setFile( array $file )
    {
        $this->files = $file;

        if( empty($this->files) ){
            $this->files = false;
            return false;
        }

        $this->filter_erros();
    }

    public function getFile()
    {
        return $this->files;
    }

    public function getType()
    {
        return 'img';
    }

    public function setMb( $mb )
    {
        $this->mega = (int) $mb;
    }

    public function getFolder()
    {
        return 'img';
    }


    private function filter_erros()
    {
        $this->files = FilterErros::filter_erros($this->files, self::$types, $this->mega);
        $this->validNames();
    }


    private function validNames()
    {
        foreach ( $this->files as $key => $val ) {
            $position = strrchr($val['name'], '.');
            $this->files[$key]['name'] = mt_rand(0, 10000) . $position;
        }

        $this->files = NameFile::rename($this->files, $this->getFolder());
    }
}