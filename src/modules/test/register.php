<?php

/*
 * Registed the pages in the module
 */
self::register('page', array(
    "id" => 'test1',
    "class" => 'src\modules\test\listTest')
        );
self::register('page', array(
    "id" => 'test2',
    "class" => 'src\modules\test\jsonTest')
        );

/*
 * Registed menu items for the module
 */
self::register('menu', array(
    "id" => 'List Test',
    "group" => 'Testing',
    "link" => 'index.php?p=test1')
        );
self::register('menu', array(
    "id" => 'Json Test',
    "group" => 'Testing',
    "link" => 'index.php?p=test2')
        );
