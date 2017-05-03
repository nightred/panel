<?php

namespace src\modules\test;

use src\layout\page;
use src\layout\menu;
use src\layout\tmpl;
use src\layout\tmplListBlock;

/**
 * Description of testPage
 *
 * @author krisa
 */
class listTest extends page {

    public function generate() {

        $this->page = new tmpl("tmpl.page");
        $header = new tmpl("tmpl.header");
        $menu = new menu();
        $footer = new tmpl("tmpl.footer");

        $this->page->setTag("cssincludes", '');
        $this->page->setTag("jsincludes", '');

        $this->page->setTag("title", "testing page");
        $header->setTag("title", "testing page");

        $this->page->setTag("header", $header->render());
        $this->page->setTag("menu", $menu->render());
        $this->page->setTag("footer", $footer->render());

        $names = array(
            array("name" => "test a",   "value" => "209"),
            array("name" => "test b",   "value" => "201"),
            array("name" => "test c",   "value" => "204"),
            array("name" => "test d",   "value" => "205")
        );
        $nameList = new tmplListBlock(
                "tmpl.list.test",
                "tmpl.list.test.row"
                );
        $nameList->setList($names);

        $this->page->setTag("content", $nameList->render());

        return $this->render();
    }

}
