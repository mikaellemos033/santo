<?php

/**
 * [classe responsável por fazer o Upload de arquivos]
 *
 * @package [Upload]
 * @category [upload]
 * @author: [Mikael Lemos] <mikaellemos033@gmail.com>
*/


namespace App\Files;

use App\Interfaces\FileValidate;


class Upload
{

    public $obj;
    public $dir;

    public $dados = array();

    public function __construct()
    {
        $this->dir = ValidDir::validFolder(date('Y'), true);
        $this->dir .= date('m');
    }

    public function setUp( FileValidate $obj )
    {
        $this->obj = $obj;
        $this->actionUp();
    }

    public function getDados()
    {
        return $this->dados;
    }

    private function actionUp()
    {
        foreach( $this->obj->getFile() as $key => $val ){
            $upload = move_uploaded_file($val['tmp_name'], "{$this->dir}/{$this->obj->getFolder()}/{$val['name']}" );

            if( $upload ){

                $this->dados[] = array(
                    'caminho' => str_replace(ROUT, '', "{$this->dir}/{$this->obj->getFolder()}/{$val['name']}"),
                    'type' => $this->obj->getType()
                );

            }
        }
    }

}