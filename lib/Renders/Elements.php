<?php

/**
 * [Class responsável por recuperar os elementos para os layouts]
 *
 * @package [Elements]
 * @category [Renders]
 * @author: [Mikael Lemos] <mikaellemos033@gmail.com>
*/


namespace App\Renders;


class Elements
{
    /**
     *
     * nome do elemento que será
     * incluido pelo layout
     *
     * @var null
     *
     */
    private $element = null;

    /**
     *
     * array indexado de parâmetros de
     * dados
     *
     * @var array
     *
     */
    private $param = array();

    /**
     *
     * variaveis que vem do layout
     * e todos os elementos terão acessoa ela
     *
     * @var array
     *
     */
    private $layout_varibles = array();


    public function __construct( $layout_variables = null )
    {
        $this->layout_varibles = (array) $layout_variables;
    }

    /**
     *
     * Metódo usado para recuperar
     * o element e inseri-lo no
     * layout da página
     *
     * @param $element
     *
     */
    public function getElement( $element, $parametros = null ){

        $this->element = (string) $element;
        $this->param = (array) $parametros;

        $this->recupereElement();
    }

    /**
     *
     * Metódo usado para recuperar o
     * elemento
     *
     * @return bool|mixed
     *
     */
    private function recupereElement()
    {
        if( !$this->valid() ){
            return false;
        }

        if( is_array($this->layout_varibles) && !empty($this->layout_varibles) ){
            extract($this->layout_varibles, EXTR_OVERWRITE, null);
        }

        if( is_array($this->param) && !empty($this->param) ){
            extract($this->param, EXTR_PREFIX_SAME, 'element');
        }

        if( strrchr($this->element, '.') == '.php' ){
            include $this->element;
            return true;
        }

        echo file_get_contents($this->element);
    }

    /**
     *
     * Metódo usado para verificar a
     * existencia de arquivos
     *
     * @return bool
     */
    private function valid()
    {
        $this->element = "app/View/elements/{$this->element}";

        if( !file_exists($this->element) ){
            return false;
        }

        return true;
    }



}