<?php

/**
 * [descrição]
 *
 * @package [Rota]
 * @category [Route]
 * @author: [Mikael Lemos] <mikaellemos033@gmail.com>
*/


namespace App\Routes;

use App\Load;

class Router
{
    private $path;
    private $callable;
    private $matches;
    private $params;

    private $url;

    public function __construct($path, $callable)
    {
        $this->path = trim($path, '/');
        $this->callable = $callable;
    }


    public function match($url)
    {
        $this->url = trim($url, '/');
        $path = preg_replace_callback('#:([\w]+)#', array($this, 'paramMatch') , $this->path);

        $regex = "#^{$path}$#i";

        if( !preg_match($regex, $this->url, $matches) ){
            return false;
        }

        array_shift($matches);

        $this->matches = $matches;

        return true;

    }

    public function call()
    {
        if( is_array($this->callable) ){

            $loadControl = new Load\IncCtrl($this->callable);
            return $loadControl->call();

        }else{
            return call_user_func_array( $this->callable, $this->matches );
        }
    }


    public function with($path, $regex)
    {
        $this->params[$path] = str_replace('(', '(?:', $regex);

        return $this;
    }


    public function paramMatch($matches)
    {

        if( isset($this->params[$matches[1]]) ){
            return '(' . $this->params[$matches[1]] . ')';
        }

        return '([^/]+)';

    }

}