<?php
/*
 * arquivo de layout do
 * admin do site
 *
 * pode-se adicionar variaveis ao
 * layout e passa-las pela controller
 *
 *
 */

 $html->getElement('head-adm.php');

 $html->getElement('menu-adm.html');

 require($view_render);

 $html->getElement('footer.html');


