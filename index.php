<?php

use src\util\config;
use src\controller\controller;

ini_set("error_reporting", "true");
error_reporting(E_ALL|E_STRCT);

require_once 'src/autoload.php';
$autoLoader = new autoLoader();

config::setConfig(array(
    "paths"     =>  array(
        "tmpl"      =>  "/tmpl/",
        "modules"   =>  "/src/modules/",
        "data"      =>  "/data/",
        "js"        =>  "js/",
        "css"       =>  "css/"
    ),
    "BASE_DIR"  => __DIR__,
    "DOC_ROOT"  => $_SERVER["DOCUMENT_ROOT"],
    "BASE_URL"  => (str_replace('\\', '/', substr(__DIR__, strlen($_SERVER["DOCUMENT_ROOT"])))),
    ));

$controller = new controller();
$controller->main();
