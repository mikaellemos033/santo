<?php
/**
 * simple bootstrap for load
 * of providers, and set paths
 */

require (__DIR__ . '/../../vendor/autoload.php');
define('SECT_BASE', __DIR__);

(new Sect\Providers\KickProvider())->handle((new Sect\Config\Raw(SECT_BASE . '/Fire'))->fire('Providers'));