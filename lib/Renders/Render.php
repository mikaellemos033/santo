<?php

/**
 * [classe responsavel por redenrizar contéudo]
 *
 * @package [Render]
 * @category [Renderizacao]
 * @author: [Mikael Lemos] <mikaellemos033@gmail.com>
*/


namespace App\Renders;
use App\Renders\Elements;


class Render
{
    /**
     *
     * variavel que contem o nome do layout
     *
     * @var string
     *
     */
    private $layout;

    /**
     *
     * conjunto de parâmetros que
     * serão passados para o layout
     *
     * @var array
     *
     */
    private $layoutParams = array();

    /**
     *
     * View que será renderizada
     *
     * @var string
     *
     */
    private $view;

    /**
     *
     * Metodo usado para setar um layout
     * na página
     *
     * @param string $layout
     *
     */
    public function layout($layout)
    {
        $this->layout = (string) $layout;
    }

    /**
     *
     * Metodo usado para redenrizar uma View
     *
     * @param $view
     * @param null $param
     *
     * @return bool|mixed
     *
     */
    public function view($view, $param = null)
    {
        $this->view = (string) $view;
        return $this->validView( $param );
    }

    /**
     *
     * Metodo usado para setar parâmetros no layout
     *
     * @param array $params
     *
     */
    public function paramLayout( array $params ){
        $this->layoutParams = array_merge($this->layoutParams, $params);
    }

    /**
     * validando a existencia de um layout
     *
     * @return bool
     */
    private function validLayout()
    {
        if( !$this->layout || !file_exists("app/View/layout/{$this->layout}.php") ){
            return false;
        }

        return true;
    }

    /**
     *
     * validando a existencia da View
     * e do layout, podendo retornar um
     * ou outro
     *
     * @param null|array $param
     *
     * @return bool|mixed
     */
    private function validView( $param = null )
    {
        if( !file_exists( ROUT . "/app/View/{$this->view}") ){
            die( "View {$this->view} não encontrada, por favor verifique seu código!" );
        }

        if( is_array($param) && !empty($param) ){
            extract($param, EXTR_OVERWRITE, null);
        }

        if( !$this->validLayout() ){
            return require( ROUT . "/app/View/{$this->view}");
        }

        return $this->incLayout();
    }

    /**
     *
     * metodo usado para incluir layout
     *
     * @return mixed
     *
     */
    private function incLayout()
    {
        extract( $this->layoutParams, EXTR_OVERWRITE, null );

        $view_render = ROUT . "/app/View/{$this->view}";
        $html = new Elements($this->layoutParams);

        return require( ROUT . "/app/View/layout/{$this->layout}.php" );
    }


}