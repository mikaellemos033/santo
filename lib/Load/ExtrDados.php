<?php

/**
 * [descrição]
 *
 * @package [ExtrDados]
 * @category [Load Controller]
 * @author: [Mikael Lemos] <mikaellemos033@gmail.com>
*/


namespace App\Load;


class ExtrDados
{
    /** @var [string] url do site */
    private $url;

    /** @var  [string] nome do controller */
    private $obj;

    /** @var  [string] nome do metodo */
    private $method;

    /** @var  [string] parametros */
    private $param;

    public function __construct( $url )
    {
        $this->url = trim($url, '/');
    }

    private function extrair()
    {
        if( empty($this->url) ){
            return false;
        }

        $this->url = explode('/', $this->url);

        $this->obj = explode('-', $this->url[0]);
        $this->obj = implode('', array_map( 'ucwords', $this->obj ));

        array_shift($this->url);

        if( empty($this->url) ){
            $this->method = 'index';
            return array('controller' => $this->obj, 'method' => $this->method, 'param' => null);
        }

        $this->method = $this->url[0];
        $this->param = array_slice($this->url, +1);

        return array('controller' => $this->obj, 'method' => $this->method, 'param' => $this->param);

    }

    public function get()
    {
        return $this->extrair();
    }

}