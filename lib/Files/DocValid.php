<?php

/**
 * [Classe responsável por validar documentos de texto]
 *
 * @package [DocValid]
 * @category [Valid Document]
 * @author: [Mikael Lemos] <mikaellemos033@gmail.com>
*/


namespace App\Files;

use App\Dados\GenerateUrl;
use App\Interfaces\FileValidate;

class DocValid implements FileValidate
{

    /**
     *
     * Tamanho maximo do
     * arquivo em MB
     *
     * @var int
     *
     */
    private $mega = 3;

    /**
     *
     * arquivo de dados formatado
     *
     * @var array
     *
     */
    private $files;

    /**
     *
     * formatos de arquivos permitidos
     *
     * @var array
     *
     */
    private static $types = array(
        'application/pdf'
    );

    /**
     *
     * Seta os dados para
     * upload
     *
     * @param array $file
     *
     */
    public function setFile( array $file )
    {
        $this->files = $file;
        $this->filter_erros();
    }


    /**
     *
     * recupera o tipo do documento
     *
     * @return string
     */
    public function getType()
    {
        return 'doc';
    }


    /**
     *
     * retorna o array de dados
     * validado
     *
     * @return array
     */
    public function getFile()
    {
        return $this->files;
    }

    /**
     *
     * seta o tamanho máximo do arquivo
     * em megabytes
     *
     * @param $mb
     */
    public function setMb( $mb ){
        $this->mega = (int) $mb;
    }


    /**
     *
     * retorna a pasta onde o arquivo
     * terá que ser enviado
     *
     * @return string
     */
    public function getFolder()
    {
        return 'doc';
    }

    /**
     *
     * filtra os erros dos arquivos
     * de maneira geral
     *
     */
    private function filter_erros()
    {
        $this->files = FilterErros::filter_erros($this->files, self::$types, $this->mega);
        $this->validNames();
    }


    /**
     *
     * valida o nome dos arquivos
     * da maneira correspondente a
     *
     * cada padrão
     *
     */
    private function validNames()
    {
        foreach ( $this->files as $key => $val ) {
            $position = strrpos($val['name'], '.');
            $this->files[$key]['name'] = GenerateUrl::generateUrl( substr($val['name'], 0, $position) ) . strrchr($val['name'], '.');
        }

        $this->files = NameFile::rename($this->files, $this->getFolder());
    }

}