<?php 
/**
 * simple bootstrap for load
 * of providers, and set paths
 */

require (__DIR__ . '/../../vendor/autoload.php');
define('BASE', __DIR__);

(new Sect\Providers\KickProvider())->handle();