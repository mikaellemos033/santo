<?php

/**
 * [descrição]
 *
 * @package [IncCtrl]
 * @category [Load Controller]
 * @author: [Mikael Lemos] <mikaellemos033@gmail.com>
*/


namespace App\Load;

use \Http\Controller;

class IncCtrl
{
    private $controller;
    private $page404;

    private $obj;
    private $folder = 'app/Controller';

    public function __construct( array $ctrl, $page404 = null )
    {
        $this->controller = $ctrl;
        $this->page404 = (array) $page404;
    }

    private function inc()
    {
        if( !file_exists("{$this->folder}/{$this->controller['controller']}Controller.php") ){
            return $this->page404;
        }

        return $this->controller;
    }


    private function method()
    {
        $this->obj = $this->inc();

        $this->obj['controller'] = "\\Http\\Controller\\{$this->obj['controller']}Controller";
        $this->obj['controller'] = new $this->obj['controller'];

        if( !method_exists($this->obj['controller'], $this->obj['method']) ){
            $this->obj['method'] = 'index';
        }

        $this->page404();

    }

    private function page404()
    {

        if( method_exists($this->obj['controller'], $this->obj['method']) ){
            return true;
        }

        $this->obj['controller'] = "\\Http\\Controller\\{$this->obj['controller']}Controller";

        $this->obj['controller'] = new $this->page404['controller'];
        $this->obj['method'] = $this->page404['method'];
        $this->obj['param'] = null;

    }


    public function call()
    {
        $this->method();

        if( !$this->obj['param'] ){
            return call_user_func( array($this->obj['controller'], $this->obj['method']) );
        }

        return call_user_func_array( array($this->obj['controller'], $this->obj['method']), $this->obj['param'] );
    }
}