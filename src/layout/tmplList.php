<?php

namespace src\layout;

/**
 * Description of layoutList
 *
 * @author krisa
 */
class tmplList {
    protected $tmplRow;
    protected $list;

    public function render() {

        return tmpl::merge($this->getMerge());
    }

    public function setList($list) {
        $this->list = $list;
    }

    protected function getMerge() {
        foreach ($this->list as $row) {
            $tmplRow = new tmpl($this->tmplRow);
            $tmplRow->setTags($row);
            $list[] = $tmplRow;
        };

        return $list;
    }

    public function __construct($tmplRow) {
        $this->tmplRow = $tmplRow;
    }
}
