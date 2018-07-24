<?php

namespace App;

class Helper
{
    public static function xml2array($xmlObject, $out = array ())
    {
        foreach ($xmlObject as $index => $node) {
            $out[$index] = (is_object($node)) ? self::xml2array($node) : $node;
        }

        return $out;
    }

    public static function toXml(\SimpleXMLElement $object, array $data)
    {
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $new_object = $object->addChild($key);
                self::toXml($new_object, $value);
            } else {
                $object->addChild($key, $value);
            }
        }
        return $object;
    }

    public static function removeLineBreaks($string)
    {
        return str_replace(PHP_EOL, '', $string);
    }
}
