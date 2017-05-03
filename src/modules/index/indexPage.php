<?php

namespace src\modules\index;

use src\layout\page;
use src\layout\menu;
use src\layout\tmpl;

/**
 * Description of indexPage
 *
 * @author krisa
 */
class indexPage extends page{

    public function generate() {

        $this->page = new tmpl("tmpl.page");
        $header = new tmpl("tmpl.header");
        $menu = new menu();
        $footer = new tmpl("tmpl.footer");

        $this->page->setTag("title", "dev site");
        $header->setTag("title", "dev site");

        $this->page->setTag("cssincludes", '');
        $this->page->setTag("jsincludes", '');

        $this->page->setTag("header", $header->render());
        $this->page->setTag("menu", $menu->render());
        $this->page->setTag("footer", $footer->render());

        $content = 'Zhu Li do the THING!!!';

        $this->page->setTag("content", $content);

        return $this->render();
    }

}
