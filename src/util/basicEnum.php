<?php

namespace src\util;

/**
 * Description of basicEnum
 *
 * @author krisa
 */
class basicEnum {

    private static $constCache = NULL;

    private static function getConstants() {
        if (self::$constCache == NULL) {
            self::$constCache = array();
        }

        $calledClass = get_called_class();

        if (!array_key_exists($calledClass, self::$constCache)) {
            $reflect = new \ReflectionClass($calledClass);
            self::$constCache[$calledClass] = $reflect->getConstants();
        }

        return self::$constCache[$calledClass];
    }

    public static function getValue($name, $strict = false) {
        $constants = self::getConstants();

        if (!self::isValidName($name, $strict)) {
            return false;
        }

        return $constants[$name];
    }

    public static function isValidName($name, $strict = false) {
        $constants = self::getConstants();

        if ($strict) {
            return array_key_exists($name, $constants);
        }

        $keys = array_map('strtolower', array_keys($constants));

        return in_array(strtolower($name), $keys);
    }

    public static function isValidValue($value) {
        $values = array_values(self::getConstants());

        return in_array($value, $values, $strict = true);
    }

    /*
     * Prevent instances
     */
    private function __construct() {

        return;
    }
}
