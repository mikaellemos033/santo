<?php

/**
 * [descrição]
 *
 * @package [Erro]
 * @category [Erro]
 * @author: [Mikael Lemos] <mikaellemos033@gmail.com>
*/


namespace Http\Controller;

class ErroController extends AppController
{
    public function page404()
    {
        $this->layout = 'index';
        echo 'fudeu';
    }
}