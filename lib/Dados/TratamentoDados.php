<?php

namespace App\Dados;


class TratamentoDados
{

    /**
     *
     * Dados que serão tratados
     *
     * @var array
     *
     */
    public $filter;

    /**
     *
     * array temporario de retorno
     * de dados
     *
     * @var array
     *
     */
    public $temp;

    /**
     *
     * Atalhos de Funções nativas
     *
     * @var array
     */
    private static $atalhos = array(
        'string' => 'is_string',
        'int' => 'is_int',
        'noempty' => '!empty',
        'bool' => 'is_bool',
        'convert_int' => 'int_val',
        'join' => 'implode',
        'split' => 'explode',
        'array' => 'is_array',
        'numeric' => 'is_numeric'
    );


    /**
     *
     * Inicia o tratamento de informações
     *
     * @param array $filter
     *
     */
    public function tratamentoInfo(array $filter )
    {
        $this->filter = $filter;
        $this->temp = array();

        $this->limpandoDados();
        $this->getMessage();
    }

    /**
     *
     * Retorna o array temporatio com
     * os dados filtrados
     *
     * @return array
     *
     */
    public function getTemp()
    {
        return $this->temp;
    }

    /**
     *
     * Retorna uma mensagem de error
     * caso haja um
     *
     * @return string
     *
     */
    public function getMessage()
    {
        $search = array_search( false, $this->temp );
        $search = ( !$search ? array_search(null, $this->temp) : $search );

        if( $search ){
           die("Houve um problema grave, no campo <b>{$this->temp[$search]} {$search} {$this->temp[$search]}</b>");
        }
    }


    /**
     *
     * Metodo resposável pela validação completa
     * dos dados informados pelo usuário
     *
     */
    private function limpandoDados()
    {
        foreach( $this->filter as $key => $val ){

            if( !is_array($val) || empty($val) ){
                continue;
            }

            $temp = $val['valor'];
            unset($val['valor']);

            foreach( $val as $k => $v ){
                $temp = $this->filtro($temp, $k, $v);
            }

            $this->temp[$key] = $temp;
        }
    }

    /**
     *
     * determina como será executada a função
     * pela função nativa eval
     *
     * @param $info
     * @param $key
     * @param $val
     * @return string
     *
     */
    private function filtro($info, $key, $val)
    {
        $funct = $this->setFunc($key, $val);

        if( $funct == 'null' ){
            return ( ( empty($info) ? 'empty_file' : $info ) );
        }

        $funct = ( !is_numeric($key) ? "{$funct}('{$val}'," .' $info);' : "{$funct}(" . '$info);' );

        eval('$funct = ' . $funct);
        return ( $funct ? $info : $funct );
    }

    /**
     *
     * Seta a função, vericando se ela
     * é uma atalho
     *
     * @param $key
     * @param $val
     * @return mixed
     *
     */
    private function setFunc( $key, $val )
    {
        if( !is_numeric($key) && in_array($key, array_keys(self::$atalhos)) ){
            return self::$atalhos[$key];

        }elseif( in_array($val, array_keys(self::$atalhos)) ){
            return self::$atalhos[$val];
        }

        return $val;
    }

}