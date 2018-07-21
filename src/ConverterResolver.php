<?php

namespace App;

use App\Converter\AtomConverter;
use App\Converter\ConverterInterface;

class ConverterResolver
{
    public static function resolve($params) : ConverterInterface
    {
        // logic for choosing converter
        return new AtomConverter();
    }
}