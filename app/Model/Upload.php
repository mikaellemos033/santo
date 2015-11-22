<?php

namespace Http\Model;

use App\Dados\GenerateUrl;
use App\Model\MainModel;

class Upload extends MainModel
{

    const TABLE = 'arquivos';

    public $up;

    public function __construct()
    {
        $this->up = new \App\Files\Upload();
        $this->crud();
    }


    public function valid_images( $file )
    {
        if( empty($file) || !is_array($file) ){
            header("Location: /page404");
        }

        $file = \App\Files\FileOrdem::ordem($file);

        $img = new \App\Files\ImgValid();
        $img->setFile( $file );

        $this->up->setUp($img);
        $this->register_doc();
    }

    public function valid_docs( $file )
    {
        if( empty($file) || !is_array($file) ){
            header("Location: /page404");
        }

        $file = \App\Files\FileOrdem::ordem($file);

        $doc = new \App\Files\DocValid();
        $doc->setFile( $file );

        $this->up->setUp($doc);
        $this->register_doc();
    }

    private function register_doc()
    {
        $create = $this->crud->useCreate();

        foreach( $this->up->getDados() as $key => $val ){
            $create->exeCreate(self::TABLE, $val);
        };

        header("Location: /uploads/");

    }

}