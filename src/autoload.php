<?php

/**
 * Class autoloader
 *
 * @author krisa
 */

class autoLoader {

    public function __construct() {

        spl_autoload_register(array($this, 'autoLoad'));

        return;
    }

    private function autoLoad($className) {
        $ds = DIRECTORY_SEPARATOR;

        $className = str_replace('\\', $ds, $className);
        $file = __DIR__."{$ds}..{$ds}{$className}.php";

        if (is_readable($file)) {
            require_once $file;
        } else {
            die("ERROR - unable to load the file '{$file}'");
        }
    }

}
