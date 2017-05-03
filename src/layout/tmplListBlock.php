<?php

namespace src\layout;

/**
 * Description of layoutListBlock
 *
 * @author krisa
 */
class tmplListBlock extends tmplList {
    protected $tmplBlock;
    protected $tagData = array();

    public function render() {

        $block = new tmpl($this->tmplBlock);

        foreach ($this->tagData as $key => $value) {
            $block->setTag($key, $value);
        }

        $block->setTag("list", tmpl::merge($this->getMerge()));
        return $block->render();
    }

    public function setTag($key, $value) {
        $this->tagData[$key] = $value;
    }

    public function __construct($tmplBlock, $tmplRow) {
        parent::__construct($tmplRow);
        $this->tmplBlock = $tmplBlock;
    }
}
