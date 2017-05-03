<?php

namespace src\util;

use src\util\config;

/**
 * Description of json
 *
 * @author krisa
 */
class jsonUtil {

    public static function readJson($file, $defaultPath = false) {

        if ($defaultPath) {
            $file = config::getValue(array("BASE_DIR"))
                    .config::getValue(array("paths", "data"))
                    .$file;
        }

        if (file_exists($file) && is_readable($file)) {
            $raw = file_get_contents($file);

            return json_decode($raw, true);
        };

        return FALSE;
    }

    public static function writeJson($file, $json, $defaultPath = false) {

        if ($defaultPath) {
            $file = config::getValue(array("BASE_DIR"))
                    .config::getValue(array("paths", "data"))
                    .$file;
        }

        try {
            $handle = fopen($file, "w");
            if (!$handle) {
                throw new Exception("Unable to open the file: '{$file}'");
            }

            fwrite($handle, json_encode($json));
            fclose($handle);

        } catch (Exception $e) {
            echo $e;
        }

        return TRUE;
    }

}
