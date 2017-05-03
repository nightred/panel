<?php

namespace src\layout;

/**
 * Description of json
 *
 * @author krisa
 */
class pageJson {

    public function __construct() {

        header('Content-type: application/json');

        return;
    }

    public function generate() {

        $json = array(
            'name' => 'test',
            'values' => array(
                1,
                2,
                3
            )
        );

        return json_encode($json);
    }

}
