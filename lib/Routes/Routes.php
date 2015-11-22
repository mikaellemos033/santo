<?php

/**
 * [descrição]
 *
 * @package [Routes]
 * @category [Route]
 * @author: [Mikael Lemos] <mikaellemos033@gmail.com>
*/


namespace App\Routes;

use App\Interfaces\LoadControle;
use App\Load;

class Routes
{
    private $url;
    private $rotas = array();
    private $nomeRoutes = array();

    private $obj;


    public function __construct($url)
    {
        $this->url = $url;
    }


    public function getLoadCtrl( LoadControle $obj )
    {
        $this->obj = $obj;
    }

    public function get($path, $callable, $nome = null)
    {
       return $this->add($path, $callable, $nome, 'GET');
    }

    public function post($path, $callable, $nome = null)
    {
       return $this->add($path, $callable, $nome, 'POST');
    }


    private function add($path, $callable, $nome, $method)
    {
        $rota = new Router($path, $callable);
        $this->rotas[$method][] = $rota;

        return $rota;
    }


    public function run()
    {
        if( !isset($this->rotas[$_SERVER['REQUEST_METHOD']]) ){
            return $this->validRota();
        }

        foreach( $this->rotas[$_SERVER['REQUEST_METHOD']] as $rotas ){

            if( $rotas->match($this->url) ){
                return $rotas->call();
            }
        }

        if( !$this->obj ){
            return false;
        }

        return $this->obj->run();
    }


    private function validRota()
    {
        if( !isset($this->rotas[$_SERVER['REQUEST_METHOD']]) ){

            if( $this->obj ){
                return $this->obj->run();
            }

            return true;
        }

        return true;
    }

}