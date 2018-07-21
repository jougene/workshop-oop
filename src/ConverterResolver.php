<?php

namespace App;

use App\Converter\ConverterInterface;
use App\Converter\RssConverter;

class ConverterResolver
{
    public static function resolve($params) : ConverterInterface
    {
        // logic for choosing converter
        return new RssConverter();
    }
}