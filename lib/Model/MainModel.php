<?php

namespace App\Model;

use App\Crud\MasterCrud;
use App\Dados;

abstract class MainModel
{
    protected $crud;
    public $valide;

    /**
     *
     * instanciando o objeto de Crud Master
     *
     */
    protected function crud()
    {
        $this->crud = new MasterCrud();
    }

    /**
     *
     * Instancia o method de Validação de
     * alguns dados
     *
     */
    protected function valide()
    {
        $this->valide = new Dados\TratamentoDados();
    }

}