<?php

/**
 * [descrição]
 *
 * @package [MainController]
 * @category [Master Controller]
 * @author: [Mikael Lemos] <mikaellemos033@gmail.com>
*/


namespace App\Controller;

use App\Renders\Render;

abstract class MainController
{
    public $components = array();
    protected $render;

    /**
     *
     * Metódo construtor que inicia
     * a objeto de reenderização
     *
     */
    public function __construct()
    {
        $this->render = new Render();
    }

    /**
     *
     * Cria components que vem das
     * classes Helpers da pasta app
     *
     * @return bool
     *
     */
    protected function components()
    {
        if( empty($this->components) ){
            return false;
        }

        foreach( $this->components as $component ){
            $obj = "\\Http\\Renders\\{$component}";
            $this->$component = new $obj;
        }

        return true;
    }

    /**
     *
     * inicia um objeto Model
     * passando o nome dele como parâmetro
     *
     * @param string $model
     *
     */
    protected function useModel( $model )
    {
        $obj = "\\Http\\Model\\{$model}";
        $this->{$model} = new $obj;
    }


    /**
     *
     * Recupera um array vindo do
     * metodo Post
     *
     * @return mixed
     *
     */
    public function requestPost()
    {
        return filter_input_array( INPUT_POST, FILTER_DEFAULT );
    }

}