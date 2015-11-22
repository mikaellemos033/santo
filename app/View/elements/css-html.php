<?php
/*
 * linkando css na página
 *
 */

 if( !empty($css) ){
    foreach( $css as $cs){
        $cs = (preg_match('/^http(s)?:/', $cs) ? $cs : "webroot/{$cs}");
        echo "<link rel='stylesheet' href='{$cs}'>";
    }
 }

/*
 * linkando arquivos js
 *
 */

 if( !empty($js) ){
    foreach( $js as $j){
        $cs = (preg_match('/^http(s)?:/', $j) ? $j : "webroot/{$j}");
        echo "<script type='text/javascript' src='{$j}'></script>";
    }
 }
