<?php

/*
 * Registed the pages in the module
 */
self::register('page', array(
    "id" => 'index',
    "class" => 'src\modules\index\indexPage')
        );

/*
 * Registed menu items for the module
 */
self::register('menu', array(
    "id" => 'Home',
    "group" => 'Main',
    "link" => 'index.php')
        );
