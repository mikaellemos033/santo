<?php
/**
 *
 * arquivo santo geral de
 * configurações
 *
 */


/*
 * Constante de caminho default
 */

 define('ROUT', __DIR__);

/*
 * constante de views
 */

 define('VIEWS', __DIR__ . '/app/View/');

/*
 * arquivo que contém algumas
 * configurações padrões
 *
 */
 require('app/Config/config-options.php');

/*
 *
 * Arquivo que contém os dados
 * de acesso a base de dados
 *
 */
 require('app/Config/database.php');

/*
 *
 * atuload de classes
 * psr-4
 *
 */
 require('vendor/autoload.php');

/*
 * esquema de rotas PHP
 */
 require('app/routes.php');


