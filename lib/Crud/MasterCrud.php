<?php

/**
 * [Classe responsável por retornar objetos das classes de Crud]
 *
 * @package [MasterCrud]
 * @category [Crud Generic]
 * @author: [Mikael Lemos] <mikaellemos033@gmail.com>
*/


namespace App\Crud;


class MasterCrud
{

    /**
     * @return object Read
     */
    public function useRead()
    {
        return new Read();
    }

    /**
     * @return object Update
     */
    public function useUpdate()
    {
        return new Update();
    }

    /**
     * @return object Delete
     */
    public function useDelete()
    {
        return new Delete();
    }

    /**
     * @return object Create
     */
    public function useCreate()
    {
        return new Create();
    }

}