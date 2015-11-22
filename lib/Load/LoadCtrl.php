<?php

/**
 * [Load de Controles]
 *
 * @package [LoadCtrl]
 * @category [Load Controller]
 * @author: [Mikael Lemos] <mikaellemos033@gmail.com>
 *
 */


namespace App\Load;
use App\Interfaces\LoadControle;

class LoadCtrl implements LoadControle
{
    /**
     *
     * url do site atual do site
     *
     * @var string
     *
     */
    private $url;

    /**
     *
     * controller padrão
     * servirá como página home
     *
     * @var array
     *
     */
    private $home = array();

    /**
     *
     * controller de página 404
     *
     * @var array
     *
     */
    private $page404 = array();

    /**
     *
     * Objeto de load de Controller
     *
     * @var object
     *
     */
    private $obj;

    /**
     *
     * Método Construtor
     *
     * @param $url
     * @param null|array $home
     * @param null|array $page404
     *
     */
    public function __construct( $url, $home = null , $page404 = null )
    {
        $this->url = $url;
        $this->home =  ( (array) $home ? $home : array('controller' => 'Home', 'method' => 'index', 'param' => null) );
        $this->page404 =( (array) $page404 ? $page404 : array('controller' => 'Erro', 'method' => 'page404', 'param' => null) );
    }

    /**
     *
     * Metódo usado para setar o
     * Controller Home
     *
     * @param array $home
     *
     */
    public function setHome( array $home )
    {
        $this->home = $home;
    }

    /**
     *
     * Metódo que seta o Controller
     * de página 404
     *
     * @param array $page404
     *
     */
    public function set404( $page404 )
    {
        $this->page404 = $page404;
    }

    /**
     *
     * Metódo usado para extrair dados
     *
     */
    private function extr()
    {
        $this->obj = new ExtrDados($this->url);
    }

    /**
     *
     * Retorna a inclusão do
     * Controller na página
     *
     * @return mixed
     */
    public function run()
    {
        return $this->inc();
    }

    /**
     *
     * Função que executa o metodo
     * do controller
     *
     * @return mixed
     *
     */
    private function inc()
    {
        if( empty($this->url) ){
            $dados = $this->home;

        }else{
            $this->extr();
            $dados = $this->obj->get();
        }

        $obj = new IncCtrl($dados, $this->page404);
        return $obj->call();
    }

}