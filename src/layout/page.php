<?php

namespace src\layout;

/**
 * Description of page
 *
 * @author krisa
 */
class page {

    protected $page;

    public function __construct() {

        return;
    }

    public function generate() {

        return "OK";
    }

    protected function render() {
        return $this->page->render();
    }
}
