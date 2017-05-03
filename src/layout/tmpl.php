<?php

namespace src\layout;

use src\util\config;

/**
 * Description of layout
 *
 * @author krisa
 */
class tmpl {

    protected $tagData = array();
    protected $tmpl;
    protected $path;

    public function render() {

        $output = $this->loadTmpl();

        foreach ($this->tagData as $key => $value) {
            $output = str_replace("[[[{$key}]]]", $value, $output);
        }

        return $output;
    }

    static public function merge($tmpls, $sep = PHP_EOL) {
        $output = "";

        foreach ($tmpls as $tmpl) {
            if (strpos(get_class($tmpl), 'src\layout\tmpl') !== FALSE ) {
                $output .= $tmpl->render();
            } else {
                $output .= "ERROR - Invalid type '".get_class($tmpl)."', expected 'resources\layout\tmpl'.";
            }
            $output .= $sep;
        }

        return $output;
    }

    public function setTag($key, $value) {
        $this->tagData[$key] = $value;
    }

    public function setTags($list) {
        foreach ($list as $key => $val) {
            $this->setTag($key, $val);
        };
    }

    private function loadTmpl() {

        $file = config::getValue(array("BASE_DIR"))
                .config::getValue(array("paths", "tmpl"))
                ."{$this->tmpl}.html";

        if (is_readable($file)) {
            $out = file_get_contents($file);
        } else {
            $out = "ERROR - unable to load the template '{$file}'";
        }

        return $out;
    }

    public function __construct($tmpl) {
        $this->tmpl = $tmpl;
    }
}
