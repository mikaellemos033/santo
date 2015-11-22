<?php
/**
 * [descrição]
 *
 * @package [Files]
 * @category [Model]
 * @author: [Mikael Lemos] <mikaellemos033@gmail.com>
*/

namespace Http\Model;

use \App\Model\MainModel;

class Files extends MainModel
{

    const TABLE = 'arquivos';

    public function __construct()
    {
        $this->crud();
    }


    public function return_img_file()
    {
        $read = $this->crud->useRead();
        $read->busca(self::TABLE, 'WHERE type = :type', 'type=img');

        return $read->getResult();
    }

    public function return_all()
    {
        $read = $this->crud->useRead();
        $read->busca(self::TABLE);

        return $read->getResult();
    }

    public function return_from_id( $id = null )
    {
        if( empty($id) || !is_numeric($id) ){
            return false;
        }

        $read = $this->crud->useRead();
        $read->busca(self::TABLE, 'WHERE id_doc = :id', "id={$id}");

        if( !$read->getBoll() ){
            return false;
        }

        return $read->getResult()[0];
    }
}