<?php

namespace src\util;

/**
 * Description of common
 *
 * @author krisa
 */
class common {

    /*
     * @param string $record The value that we are looking for
     * @param string $field The field that the record is located in
     * @param array $data the array to be search for the key
     */
    public static function getKey(
            $record,
            $field,
            $data
            ) {

        return array_search(
                $record,
                array_column(
                        $data,
                        $field
                        )
                );
    }

    public static function mergeArray($array1, $array2, $unique = false) {
        if (!$array1 && $array2) {
            return $array2;
        }

        if ($array1 && !$array2) {
            return $array1;
        }

        if ($unique) {
            return array_map("unserialize",
                    array_unique(
                            array_map("serialize",
                                    array_merge($array1,$array2)
                                    )
                            )
                    );
        }

        return array_merge($array1, $array2);
    }
}
