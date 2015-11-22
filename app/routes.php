<?php
/**
 *
 * Esquema de rotas usadas
 * para visualização de dados
 *
 *
 * Load de Controle
 *
 */

 $loadCtrl = new App\Load\LoadCtrl( $url );

 /*
  * Instancia das rotas de
  * dados PHP
  *
  */
 $routes = new App\Routes\Routes( $url );
 $routes->getLoadCtrl( $loadCtrl );

 $routes->run();