<?php

namespace fgh151\fields\fields;

class FieldTypes
{
    private static $_types = [
        1 => 'text',
        2 => 'email',
        3 => 'number',
        4 => 'textarea',
        5 => 'binaryCheckbox',
        6 => 'checkboxList'
    ];

    /**
     * @return array
     */
    public static function getTypes()
    {
        return self::$_types;
    }

    /**
     * @param $name
     * @return mixed
     */
    public static function getByName($name)
    {
        return array_search($name, self::$_types);
    }

}