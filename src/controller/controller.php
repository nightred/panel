<?php

namespace src\controller;

use src\util\config;
use src\util\requestParser;
use src\modules\module;

/**
 * Description of controller
 *
 * @author krisa
 */
class controller {

    public function __construct() {

        requestParser::parse();

        module::loadModules(
                config::getValue(array("BASE_DIR"))
                .config::getValue(array("paths", "modules"))
                );

        return;
    }

    public function init() {

        return;
    }

    public function main() {

        $req = "index";
        if (!requestParser::getValue('p') == "") {
            $req = requestParser::getValue('p');
        }

        if (module::isValid('page', $req)) {
            $reqClass = module::getValue('page', $req, 'class');
            if (class_exists($reqClass)) {
               $page = new $reqClass();
               echo $page->generate();
            }

        } else {
            die("ERROR - unable to load the requested page '{$req}'");
        }

        return;
    }
}
