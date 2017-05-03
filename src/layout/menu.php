<?php

namespace src\layout;

use src\modules\module;
use src\layout\tmpl;
use src\layout\tmplListBlock;

/**
 * Description of menu
 *
 * @author krisa
 */
class menu {

    protected $menu;
    protected $menuItems = array();

    public function render() {

        $menuList = array();
        foreach ($this->menuItems as $item) {
            $menuList[$item['group']][] = array(
                "name" => $item['id'],
                "link" => $item['link']
                    );
        }

        $menuContents = array();
        foreach ($menuList as $key => $group) {
            $row = new tmplListBlock("tmpl.menu.group", "tmpl.menu.item");
            $row->setList($group);
            $row->setTag("header", $key);
            $menuContents[] = $row;
        }

        $menu = new tmpl("tmpl.menu");
        $menu->setTag("groups", tmpl::merge($menuContents));

        return $menu->render();
    }

    public function __construct() {

        $this->menuItems = module::getRecords('menu');

        return;
    }

}
