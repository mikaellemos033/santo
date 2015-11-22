<?php
/**
 * [descrição]
 *
 * @package [Categoria]
 * @category [Controller]
 * @author: [Mikael Lemos] <mikaellemos033@gmail.com>
*/

namespace Http\Controller;

class CategoriaController extends AppController
{

    public function __construct()
    {
        parent::__construct();

        $this->useModel('Categoria');
        $this->render->layout('admin');
    }

    public function index()
    {
        echo 'Aqui serão listadas as categorias';
    }

    /**
     * Recupera os dados à serem cadastrados
     */
    public function cadastro()
    {
        $this->render->paramLayout( array(
            'title_head' => 'Cadastro de Categorias'
        ));

        $this->render->view( 'categoria/cadastro.html' );
    }

    /**
     *
     * adiciona a Categoria ao
     * banco de dados
     *
     */
    public function add()
    {
        $this->Categoria->create($this->requestPost());
    }


    public function atualiza( $id = null )
    {
        $this->render->paramLayout(array(
           'title_head' => 'Atualização de Categorias',
           'categoria' => $this->Categoria->return_from_id( $id )
        ));

        $this->render->view('categoria/update.php');
    }

    public function edit()
    {
        $this->Categoria->update($this->requestPost());
    }
}