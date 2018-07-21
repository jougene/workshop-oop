<?php

namespace App;

class Helper
{
    public static function xml2array($xmlObject, $out = array ())
    {
        foreach ( (array) $xmlObject as $index => $node )
            $out[$index] = ( is_object ( $node ) ) ? self::xml2array ( $node ) : $node;

        return $out;
    }
}