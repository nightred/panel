<?php

namespace src\modules;

/**
 * Description of moduleLoader
 *
 * @author krisa
 */
class module {

    protected static $modules = array();

    public static function isValid($type, $id) {
        if (self::getKey($type, $id) !== false) {
            return true;
        };

        return false;
    }

    public static function getValue($type, $id, $record) {

        return self::$modules
                [moduleTypes::getValue($type)]
                [self::getKey($type, $id)][$record];
    }

    public static function getRecords($type) {

        if (!moduleTypes::isValidName($type)) {
            return array();
        }

        return self::$modules[moduleTypes::getValue($type)];
    }

    protected static function getKey($type, $id) {

        return array_search($id, array_column(
                self::$modules[moduleTypes::getValue($type)],
                'id'
                ));
    }

    public static function loadModules($path) {

        $folderList = scandir($path);
        foreach ($folderList as $folder) {
            $file = $path.$folder."/register.php";
            if (is_readable($file) && is_dir($path.$folder)) {
                require_once $file;
            }
        }

        return;
    }

    /*
     * @param string $type The module type eg page, menu
     * @param array $rec defines an array with the configuration for the module
     *          it must include an id record to identify the settings
     */
    protected static function register($type, $rec) {

        if (!is_string($rec['id'])) {
            return false;
        }

        if (moduleTypes::isValidName($type)) {
            self::$modules[moduleTypes::getValue($type)][] = $rec;
        } elseif (moduleTypes::isValidValue($type)) {
            self::$modules[$type][] = $rec;
        } else {
            return false;
        }

        return true;
    }

}
