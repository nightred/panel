<?php

namespace src\util;

class config {

    protected static $config = NULL;

    public static function setConfig($array) {
        self::$config = $array;

        return;
    }

    public static function getValue($keys) {
        $stack = self::$config;

        foreach ($keys as $key) {
            if (array_key_exists($key, $stack)) {
                $stack = $stack[$key];
            } else {
                $stack = null;
                break;
            }
        }

        return $stack;
    }

}
