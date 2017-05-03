<?php

namespace src\util;

/**
 * Description of requestParser
 *
 * @author krisa
 */
class requestParser {

    private static $requests = NULL;

    public static function getValue($record) {

        if (isset(self::$requests[$record])) {
            return self::$requests[$record];
        }

        return FALSE;
    }

    public static function parse() {

        self::$requests = array_merge(
                requestParser::clean($_GET),
                requestParser::clean($_POST)
                );

        return;
    }

    private static function clean($var) {
        if (is_array($var)) {
            foreach ($var as $key => $item) {
                $var[$key] = requestParser::clean($item);
            }
        } else {
            $var = htmlentities($var, ENT_QUOTES, "UTF-8");
        }

        return $var;
    }

}
